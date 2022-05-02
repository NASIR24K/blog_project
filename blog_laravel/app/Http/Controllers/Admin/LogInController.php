<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use App\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\AuthenticateSession;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class LogInController extends Controller
{
      
    public function __construct(){
        $this->middleware('guest:admin')->except('logout');
    } 

   public function ShowAdminLogInForm(){
        return view('admin.login');
    }
    public function adminLogin(Request $request){
        //dd($request->all());
      //dd(hash::make($request->password));
        $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required|min:4'
           
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect(route('admin.dashboard'));
        }
        return redirect(route('admin.login'))->with('login_error', "E-mail & Password don't put match");
           // Session::flash('login_error', "E-mail & Password don't put match");
           // return redirect(route('admin.login')); 

    }
     function adminlogout(){
        
     dd(Auth::guard('admin')->user());
      dd('Hi...'); 
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));

    }
        function Forget(){
            return view('admin.forget');
        } 
        function ForgetPassword(Request $request){
         $email=$request->email;
         $admin=Admin::where('email', $email)->first();
         if($admin){
            $mail = new PHPMailer(true);

            try {
                //Server settings
                
               $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
              
                $mail->isSMTP();   
                                                      //Send using SMTP
                $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'a7c4e47afc4c8a';                     //SMTP username
                $mail->Password   = '4cea0bd06a4d64';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('info@example.com', 'Md Nasir Uddin');
                $mail->addAddress('info@example.com', '$admin->name');     //Add a recipient
                $mail->addAddress('nasir24k@gmail.com');               //Name is optional
               $mail->addReplyTo('info@example.com', 'Information');
             //   $mail->addCC('cc@example.com');
             //  $mail->addBCC('bcc@example.com');
            
                //Attachments
               // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
               // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
              //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
         }else{
             return back()->with('login_error', 'Acoount Not Found');
         }
        }
}
