<?php

namespace App\Http\Controllers;

use App\Models\csvDataModel;
use File;
use Illuminate\Http\Request;
use Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use ZipArchive;

class CsvToQr extends Controller {

    public function index() {
        $data = [];
        $files = glob( storage_path( 'app/public/importedCsv/*.csv' ) ); // get all file names
        foreach ( $files as $file ) { // iterate files
            $data[] = pathinfo( $file )["basename"];
        }
        return view( 'csv.csv' )->with( ['data' => $data] );
    }
//  public function index()
    //     {
    //         $data = csvDataModel::get();
    //         return view('csv.csv')->with(['data'=>$data]);
    //     }

    public function csvImport( Request $request ) {

        $file = $request->file( 'csvFile' );
        $fileName = $file->getClientOriginalName();
        $path = 'public/importedCsv';
        // return $fileName;
        $file->storeAs( $path, $fileName );

        $database = new csvDataModel;
        $database->fileName = $file->getClientOriginalName();
        $database->status = 'uploaded';
        $database->save();

        return redirect( '/' );
        // return redirect('exr');

        // Storage::putFile('public', $request->csvFile);
        // $path = Storage::putFile('photos', new File('/path/to/photo'));

        // $file->move(storage_path('/importedCsv'), $file->getClientOriginalName());
        // Illuminate\Http\UploadedFile::move('test.csv', storage_path('importedCsv'));
        // return 'done';
    }

    public function makeqr( $name ) {
        $csvFile = fopen( '../storage/app/public/importedCsv/' . $name, 'r' );

        $csvFileName = preg_replace( '/\\.[^.\\s]{3,4}$/', '', $name );

        File::makeDirectory( storage_path() . '/app/public/' . $csvFileName, 0777, true, true );
        $i = 0;
        while ( $dataRow = fgets( $csvFile ) ) {
            // can parse further $dataRow by using str_getcsv
            $uniqueCode = substr($dataRow, 23, -2);
            // dd($uniqueCode);
            QrCode::size( 300 )->format( 'png' )->backgroundColor( 255, 255, 255 )->style( 'round', 0.5 )->margin( 1 )->errorCorrection( 'M' )->generate( $dataRow, '../storage/app/public/' . $csvFileName . '/' . $uniqueCode . '.png' );
            // echo $i . '='. $row . "\n";
            $i++;
        }
        fclose( $csvFile );

        $zip = new ZipArchive;
        $zipFileName = $csvFileName . '.zip';
        if ( $zip->open( storage_path( 'app/public/' . $zipFileName ), ZipArchive::CREATE ) === TRUE ) {
            // $files = glob( storage_path( 'app/public/qrCodes/*.png' ) ); //For-individual-png-file
            $files = File::files( storage_path( 'app/public/' . $csvFileName ) ); //For-Folder

            foreach ( $files as $key => $value ) {
                $relativeNameInZipFile = basename( $value );
                $zip->addFile( $value, $relativeNameInZipFile );
            }

            $zip->close();
        }

        File::deleteDirectory( storage_path() . '/app/public/' . $csvFileName );

        return \redirect('/');
    }

    public function downloadZipFile( $name ) {
        $zipFileName = str_replace( ".csv", ".zip", $name );
        // dd($zipFileName);
        return response()->download( storage_path( 'app/public/' . $zipFileName ) );
    }

    public function fileName() {
        $files = glob( storage_path( 'app/public/importedCsv/*.csv' ) ); // get all file names
        foreach ( $files as $file ) { // iterate files
            if ( is_file( $file ) ) {
                echo pathinfo( $file )["basename"]; // delete file
                echo "<br>";
            }
        }
    }

    public function downloadZip() {
        $zip = new ZipArchive;
        $fileName = 'myNewFile3.zip';
        if ( $zip->open( storage_path( 'app/public/' . $fileName ), ZipArchive::CREATE ) === TRUE ) {
            $files = glob( storage_path( 'app/public/qrCodes/*.png' ) );
            // $files = File::files(storage_path('app/public/qrCodes'));

            foreach ( $files as $key => $value ) {
                $relativeNameInZipFile = basename( $value );
                $zip->addFile( $value, $relativeNameInZipFile );
            }

            $zip->close();
        }

        return response()->download( public_path( $fileName ) );
    }

    // public function fileName()
    // {
    //     $files = glob( storage_path( 'app/public/importedCsv/*.csv' ) ); // get all file names
    //     foreach ( $files as $file ) { // iterate files
    //         if ( is_file( $file ) ) {
    //             echo pathinfo( $file )["basename"]; // delete file
    //             echo "<br>";
    //         }
    //     }
    // }

    // public function index()
    // {
    //     $files = glob( storage_path( 'app/public/importedCsv/*.csv' ) ); // get all file names
    //     foreach ( $files as $file ) { // iterate files
    //         if ( is_file( $file ) ) {
    //             $x[] = pathinfo( $file )["basename"]; // delete file
    //         }
    //     }
    //     // return $x;
    //     return view('csv.csv')->with(['x'=>$x]);
    // }

    // public function makeDir()
    // {
    //     $result = File::makeDirectory( storage_path().'/app/public/FjRobin', 0777, true, true );
    //     dd($result);
    // }

}
