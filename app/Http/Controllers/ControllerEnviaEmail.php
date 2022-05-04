<?php

namespace App\Http\Controllers;

use App\Imports\CriancaImport;
use App\Imports\Criancas;
use App\Mail\Email;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Maatwebsite\Excel\Facades\Excel;


use PhpOfficePhpSpreadsheetSpreadsheet;
use PhpOfficePhpSpreadsheetReaderCsv;
use PhpOfficePhpSpreadsheetReaderXlsx;

use App\Models\Aluno;
use App\Models\Ano_Lectivo;
use App\Models\Encarregado;
use App\Models\Encarregado_has_Aluno;
use App\Models\Matricula;
use App\Models\Sala;

class ControllerEnviaEmail extends Controller
{

    function email()
    {
        return view('email');
    }
    function enviar1()
    {

        //Load Composer's autoloader
        // require 'vendor/autoload.php';
        require base_path("vendor\autoload.php");

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'angelohuns@gmail.com';                     //SMTP username
            $mail->Password   = 'angeloHUNS1995Gmail';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('angelohuns@gmail.com', 'angelo');
            $mail->addAddress('geral.info@wisekumbu.com', 'geral.info@wisekumbu.com');     //Add a recipient
            $mail->addAddress('geral.info@wisekumbu.com');               //Name is optional
            $mail->addReplyTo('geral.info@wisekumbu.com', 'Information');
            $mail->addCC('geral.info@wisekumbu.com');
            $mail->addBCC('geral.info@wisekumbu.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function enviar2(Request $request)
    {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'mail.wisekumbu.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'geral.info@wisekumbu.com';   //  sender username
            $mail->Password = 'zY3$srA$$}=n';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('geral.info@wisekumbu.com', 'geral.info@wisekumbu.com');
            $mail->addAddress('geral.info@wisekumbu.com');
            $mail->addCC('geral.info@wisekumbu.com');
            $mail->addBCC('geral.info@wisekumbu.com');

            $mail->addReplyTo('geral.info@wisekumbu.com', 'geral.info@wisekumbu.com');

            if (isset($_FILES['emailAttachments'])) {
                for ($i = 0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = 'geral.info@wisekumbu.com';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

            // $mail->AltBody = plain text version of email body;

            if (!$mail->send()) {
                // return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
                dd("error");
            } else {
                dd("sucesso");
                // return back()->with("success", "Email has been sent.");
            }
        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent.');
        }
    }

    function enviar3()
    {
        $email = "angelohuns@gmail.com";
        $codigo = "codigo";
        Mail::to($email)->send(new Email($email, $codigo));
    }

    function enviar4(Request $request)
    {
        // dd($request->all());

        Excel::import(new Criancas, $request->file);
    }

    function enviar5()
    {
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);

            if ('csv' == $extension) {
                $reader = new PhpOfficePhpSpreadsheetReaderCsv();
            } else {
                $reader = new PhpOfficePhpSpreadsheetReaderXlsx();
            }

            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            if (!empty($sheetData)) {
                for ($i = 1; $i < count($sheetData); $i++) {
                    $nome = $sheetData[$i][1];
                    $tipo_doc = $sheetData[$i][2];
                    echo $nome;

                    // $db->query("INSERT INTO USERS(name, email) VALUES('$name', '$email')");
                }
            }
        }
    }

    function enviar()
    {


        //$dados = $_FILES['arquivo'];
        //var_dump($dados);

        if (!empty($_FILES['file']['tmp_name'])) {
            $arquivo = new DOMDocument();
            $arquivo->load($_FILES['file']['tmp_name']);
            //var_dump($arquivo);

            $linhas = $arquivo->getElementsByTagName("Row");
            //var_dump($linhas);

            $primeira_linha = true;

            foreach ($linhas as $linha) {
                if ($primeira_linha == false) {

                    if (is_object($linha->getElementsByTagName("Data")->item(0))) {
                        $nome = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                        $tipo_doc = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                        $numero_doc = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                        $data_validade = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
                        $data_nasc = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
                        $endereco = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
                        $funcionario_id = $linha->getElementsByTagName("Data")->item(6)->nodeValue;

                        $nome_pai = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
                        $tipo_doc_pai = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
                        $numero_doc_pai = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
                        $data_validade_pai = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
                        $endereco_pai = $linha->getElementsByTagName("Data")->item(11)->nodeValue;
                        $telefone1_pai = $linha->getElementsByTagName("Data")->item(12)->nodeValue;
                        $telefone2_pai = $linha->getElementsByTagName("Data")->item(13)->nodeValue;
                        $email_pai = $linha->getElementsByTagName("Data")->item(14)->nodeValue;
                        $funcionario_id_pai = $linha->getElementsByTagName("Data")->item(15)->nodeValue;
                        $sala = $linha->getElementsByTagName("Data")->item(16)->nodeValue;

                    }


                    $aluno_existe = Aluno::where('numero_doc', '=', $numero_doc)->first();
                    if ($aluno_existe === null) {

                        $aluno_save = Aluno::create([
                            'nome' => $nome,
                            'tipo_doc' => $tipo_doc,
                            'numero_doc' => $numero_doc,
                            'data_validade' => $data_validade,
                            'data_nasc' => $data_nasc,
                            'endereco' => $endereco,
                            'funcionario_id' => $funcionario_id

                        ]);

                        $aluno = Aluno::get()->last();
                        $sala = Sala::where('sala','=',$sala)->first();
                        $ano_lectivo = Ano_Lectivo::get()->last();


                        $matricula = Matricula::create([
                            'aluno_id'=>$aluno->id,
                            'sala_id'=>$sala->id,
                            'ano_lectivo_id'=>$ano_lectivo->id,
                            'funcionario_id'=>$funcionario_id_pai
                        ]);

                        $encarregado_exist = Encarregado::where('numero_doc', '=', $numero_doc_pai)->first();

                        if ($encarregado_exist === null) {

                            $encarregado_save = Encarregado::create([
                                'nome' => $nome_pai,
                                'tipo_doc' => $tipo_doc_pai,
                                'numero_doc' => $numero_doc_pai,
                                'data_validade' => $data_validade_pai,
                                'endereco' => $endereco_pai,
                                'telefone1' => $telefone1_pai,
                                'telefone2' => $telefone2_pai,
                                'email' => $email_pai,
                                'funcionario_id' => $funcionario_id_pai

                            ]);

                            $encarregado = Encarregado::get()->last();

                            $encarregado_has_crianca = Encarregado_has_Aluno::create([
                                'aluno_id' => $aluno->id,
                                'encarregado_id' => $encarregado->id
                            ]);

                        } else {

                            $encarregado_has_crianca = Encarregado_has_Aluno::create([
                                'aluno_id' => $aluno->id,
                                'encarregado_id' => $encarregado_exist->id
                            ]);

                        }
                    }
                }

                $primeira_linha = false;
            }
            return redirect()->route('alunos.index')->with('status', 'success');
        }
    }
}
