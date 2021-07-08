<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Response;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use File;

// use App\Http\Controllers\QrCode;

class GenerateQrCodeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return 'index';
    }

    public function menu()
    {
        $path = \base_path();
        return $path;
    }

    public function csvImport(Request $request)
    {
        

        $file = $request->file('csvFile');
        $fileName = $file->getClientOriginalName();
        $path = 'public/importedCsv';
        // return $fileName;
        return $file->storeAs($path, $fileName);
        
        // Storage::putFile('public', $request->csvFile);
        // $path = Storage::putFile('photos', new File('/path/to/photo'));


        // $file->move(storage_path('/importedCsv'), $file->getClientOriginalName());
        // Illuminate\Http\UploadedFile::move('test.csv', storage_path('importedCsv'));
        // return 'done';
    }

    public function test_page() {
        // $spreadsheet = new Spreadsheet();
        // $sheet = $spreadsheet->getActiveSheet();
        // $sheet->setCellValue( 'A1', 'Hello World !' );

        // $writer = new Xlsx( $spreadsheet );
        // $writer->save( 'hello_world.xlsx' );
    }

    public function makeCsvToQr() {
        $fileData = fopen( '../storage/app/public/importedCsv/forQR.csv', 'r' );
        $i = 1;
        while ( $row = fgets( $fileData ) ) {
            // can parse further $row by usingstr_getcsv
            QrCode::size( 300 )->format( 'png' )->backgroundColor( 255, 255, 255 )->style( 'round', 0.5 )->margin( 1 )->errorCorrection( 'H' )->generate( $row, '../storage/app/public/' . $i . '.png' );
            // echo $i . '='. $row . "\n";
            $i++;

        }
        fclose( $fileData );
        return 'Success';

    }

    public function readFile()
    {
        $fileData = fopen( '../storage/app/public/importedCsv/Mups.csv', 'r' );
        for ($i=1; $data = fgets($fileData) ; $i++) {
            echo $i . ': ' . $data;
            echo "<br>";
        }
        echo 'Number of Line is: '. count(file('../storage/app/public/importedCsv/Mups.csv'));
        fclose( $fileData );

    }

    public function query( Request $request ) {
        $data = $request->all();
        print_r( $data );
    }

    public function SimpleUrlQRData() {
        $items = [];
        for ( $i = 0; $i < 100; $i++ ) {
            $items[][] = $this->generateCode();
            // $items[][] = 'https://panacea.live/livecheck/'. $this->generateCode();
        }

        $file = fopen( storage_path( 'RobinSir2/' . "url-qr-data.csv" ), "w" );

        foreach ( $items as $line ) {
            fputcsv( $file, $line );
        }

        fclose( $file );
        return 'done with ' . $i . ' items';
    }

    public function excel() {

        $items = [];
        for ( $i = 0; $i < 500000; $i++ ) {
            $items[][] = 'cutt.ly/' . $this->generateCode();
        }

        $file = fopen( storage_path( 'RobinSir2/QR-assets/' . "15CH-cuttly-without-HTTPS-500000.csv" ), "w" );

        foreach ( $items as $line ) {
            fputcsv( $file, $line );
        }

        fclose( $file );
        return 'done with ' . $i . ' items';

    }

    public function kaka() {
        for ( $i = 0; $i < 10; $i++ ) {
            $code = $this->generateCode();
            QrCode::size( 300 )->format( 'png' )->merge( '../public/img/renata.png', 0.3, true )->backgroundColor( 255, 255, 255 )->style( 'round', 0.5 )->margin( 1 )->errorCorrection( 'H' )->generate( 'https://panacea.live/livecheck/' . $code, storage_path( 'RobinSir2/' . $code . '.png' ) );

            // $source = storage_path('RobinSir2/'. $code . '.png');
            // $dest = '../storage/bmpQR/' . $code . '.bmp';
            // $this->imageConvertion( $source, $dest );
        }
        $this->destroy();

        $this->getFilename();

        return 'QR Generated: ' . $i . ' items';
    }

    public function robin() {
        for ( $i = 0; $i < 100; $i++ ) {
            $code = $this->generateCode();
            QrCode::size( 300 )->format( 'png' )->merge( '../public/img/renata.png', 0.3, true )->backgroundColor( 255, 255, 255 )->style( 'round', 0.5 )->margin( 1 )->errorCorrection( 'H' )->generate( 'https://panacea.live/livecheck/' . $code, '../storage/pngQR/' . $code . '.png' );
            $source = '../storage/pngQR/' . $code . '.png';
            $dest = '../storage/bmpQR/' . $code . '.bmp';
            $this->imageConvertion( $source, $dest );
            // $this->destroy();
        }
        $this->destroy();
        $this->getFilename();
        return 'QR Generated: ' . $i . ' items';
    }

    public function robin2( $code ) {
        $data['code'] = $code;
        return view( 'livecheckpro.index' )->with( $data );
        // return view('robin')->with($data);
    }

    public function result() {
        return view( 'livecheckpro.result' );
    }

    private function generateCode() {
        $an = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $su = strlen( $an ) - 1;
        $generatedString = substr( $an, rand( 0, $su ), 1 ) .
        substr( $an, rand( 0, $su ), 1 ) .
        substr( $an, rand( 0, $su ), 1 ) .
        substr( $an, rand( 0, $su ), 1 ) .
        substr( $an, rand( 0, $su ), 1 ) .
        substr( $an, rand( 0, $su ), 1 ) .
        substr( $an, rand( 0, $su ), 1 );
        if ( $generatedString == "MCKRTW" || $generatedString == "MCKRTWS" || $generatedString == "MTAJGPD" ) {
        } else {
            return $generatedString;
        }
    }

    public function livecheck() {
        return QrCode::size( 300 )->generate( 'https://panacea.live/livecheck' );
    }
    public function simpleQrCode() {

        QrCode::size( 300 )->format( 'png' )->backgroundColor( 255, 255, 255 )->style( 'round', 0.5 )->margin( 1 )->errorCorrection( 'H' )->generate( 'https://panacea.live/lc/JSJKQAT', '../storage/robinsir/current/JSJKQAT.png' );

        return 'done';

    }

    public function colorQrCode() {

        return \QrCode::size( 300 )
            ->backgroundColor( 255, 55, 0 )
            ->generate( 'A simple example of QR code' );

    }

    public function imageQrCode() {

        $image = \QrCode::format( 'png' )
            ->merge(  ( '../public/img/renata.png' ), 0.5, true )
            ->size( 300 )->errorCorrection( 'H' )
            ->generate( 'A simple example of QR code!', '../storage/qr.png' );
        return $image;

    }

    public function ahmed() {
        // $data = Info::pluck('code');
        // $value = $this->generateCode();

        // $x = QrCode::size(300)->format( 'png' )->generate("Here is your code: $value", '../storage/qr/a.png');
        // return imagebmp( '../storage/qr/a.png', 'php.bmp' );

        $im = new \Imagick( '../storage/qr/a.png' );
        return $im->writeImage( '../storage/qr/robin.bmp' );

    }

    public function liveview() {
        for ( $i = 1; $i <= 10; $i++ ) {
            $qrcode = new BaconQrCodeGenerator;
            $code = $this->generateCode();
            $qrcode->size( 300 )->generate( "your code is: $code", '../storage/qr/robin' . $code . '.png' );
            return 'ok';
        }

    }

    public function imageConvertion( $source, $dest ) {

        $manager = new ImageManager( ['driver' => 'imagick'] );
        $s = $source;
        $d = $dest;
        $test = $manager->make( $s )->save( $d );
    }

    public function destroy() {
        $files = glob( '../storage/pngQR/*' ); // get all file names
        foreach ( $files as $file ) { // iterate files
            if ( is_file( $file ) ) {
                unlink( $file ); // delete file
            }
        }
    }

    public function getFilename() {
        $files = glob( storage_path( 'bmpQR/*.bmp' ) ); // get all file names
        foreach ( $files as $file ) { // iterate files
            if ( is_file( $file ) ) {
                $x[][] = pathinfo( $file )["basename"]; // delete file
            }
        }
        $file = fopen( storage_path( 'bmpQR/' . "bmpQR.csv" ), "w" );

        foreach ( $x as $line ) {
            fputcsv( $file, $line );
        }

        return fclose( $file );
        return 'done';

    }

    

    public function dir() {
        Storage::makeDirectory( 'FjRobinx', 0777, true, true );
        return Storage::allDirectories( '/' );
    }

    public function makeFolder($FolderName)
    {
        $make = File::makeDirectory( storage_path().'/app/public/'. $FolderName, 0777, true, true );
        dd($make);
    }

    public function deleteFolder($FolderName)
    {
        $make = File::deleteDirectory( storage_path().'/app/public/'. $FolderName );
        dd($make);
    }
}
