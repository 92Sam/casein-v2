<?php
namespace common\components;
use Yii;
use yii\base\Component;
use common\modules\sys_account_manager\models\SysCompany;

class Mail 
{
    public function sendEmail($to,$body,$subject)
    {
         $mail = Yii::$app->mailer->compose();
         $mail->setTo($to);
         $mail->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' noreply']);
         $mail->setSubject($subject);
         $mail->setHtmlBody($body);
         $mail->send();
    }
    
    public function sendTokenEmail($user,$sysAccesToken,$to)
    {
         $mail = Yii::$app->mailer->compose('@common/mail/passwordResetToken-html',['sysUsers' => $user,'sysAccesToken' => $sysAccesToken]);
         $mail->setTo($to);
         $mail->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' noreply']);
         $mail->setSubject('RibelaERP - Link para Recuperar Clave de Acceso');
         $mail->send();
    }
    
    public function notificationNewCompany($to,$companyName,$username,$password) 
    {
        $body = 'Hola '.$companyName;
        $body .= '<br>';
        $body .= 'Es un gusto saludarlo como parte de los clientes del producto RibelaERP.';
        $body .= '<br>';
        $body .= 'Aquí se encuentran su usuario ('.$username.') y contraseña ('.$password.').';
        $subject = 'RibelaERP - Credenciales de Acceso para Compañia';
        $mail = $this->sendEmail($to, $body, $subject);
        return $mail;
    }
    
    public function notificationNewUser($to,$profileName,$username,$password) 
    {
        $companyName = Yii::$app->session->get('user.company_name');
        $body = 'Hola '.$profileName;
        $body .= '<br>';
        $body .= 'Es un gusto saludarlo como parte del equipo de trabajo de '.$companyName.'.';
        $body .= '<br>';
        $body .= 'Aquí se encuentran su usuario ('.$username.') y contraseña ('.$password.').';
        $subject = $companyName . ' - Credenciales de Acceso para Usuario';
        $mail = $this->sendEmail($to, $body, $subject);
        return $mail;
    }
    public function notificationNewPassword($to,$profileName,$username,$password){
        $body = 'Hola '.$profileName;
        $body .= '<br>';
        $body .= 'Es un gusto saludarlo como parte de los clientes del producto RibelaERP.';
        $body .= '<br>';
        $body .= 'Su contraseña a sido generada exitosamente ('.$password.').';
        $subject = 'RibelaERP - Cambio de clave';
        $mail = $this->sendEmail($to, $body, $subject);
        return $mail;
    }
}

