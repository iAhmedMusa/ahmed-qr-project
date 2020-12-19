<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManager;
use Response;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateQrCodeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return "This is Index QR-CODE";
    }

    public function code() {

        for ( $i = 0; $i <= 10; $i++ ) {
            $data = [
                'code' => $this->generateCode(),
            ];
        }
        Info::create( $data );
        // return QrCode::size( 200 )->format( 'svg' )->generate( $v );

    }

    public function robin() {
        for ( $i = 0; $i < 5; $i++ ) {
            $code = $this->generateCode();
            QrCode::size( 300 )->format('png')->merge('../public/img/renata.png', 0.3, true )->backgroundColor(255,255,255)->style('round', 0.5)->margin(1)->errorCorrection( 'H' )->generate( 'https://7a90e147548d.ngrok.io/robin2/'.$code, '../storage/pngQR/' . $code . '.png' );
            $source = '../storage/pngQR/' . $code . '.png';
            $dest = '../storage/bmpQR/' . $code . '.bmp';
            $this->imageConvertion( $source, $dest );
            $this->destroy();
        }
        return 'done';
    }
    
    public function robin2($code) {
        $data['code'] = $code;
        return view('livecheckpro.index')->with($data);
        // return view('robin')->with($data);
    }

    public function result()
    {
        return view('livecheckpro.result');
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

        return \QrCode::size( 300 )->generate( 'https://panacea.live/livecheck', '../storage/robinsir/simple.png' );

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

        $manager = new ImageManager( [ 'driver' => 'imagick' ] );
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
}
