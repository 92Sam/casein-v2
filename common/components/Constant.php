<?php

namespace common\components;
 
use Yii;
use yii\base\Component;
use yii\helpers\Html;
use yii\helpers\Json;
use common\modules\sys_account_manager\models\AccessControl;

class Constant extends Component
{
    public $company_id;
    public $rol_id;
    
    public function setConstantsId()
    {
        $array_user_permission = $array_rol_permission = $array_group_permission = [];
        try {
            $sql = "SELECT (CASE 
                                WHEN g.name = 'companies' 
                                    THEN c.name 
                                ELSE ((a.profile->>'first_name') || ' ' || (a.profile->>'first_surname')) 
                            END) as name_identity,
                    ac.permission as user_permission,
                    r.id as rol_id, r.name as rol_name, r.permission as rol_permission,
                    c.id as company_id, c.name as company_name, 
                    g.id as group_id, g.name as group_name, g.permission as group_permission
                    FROM sys_users u
                    LEFT JOIN sys_access_control ac ON u.id = ac.users_id
                    INNER JOIN sys_account a ON a.id = u.account_id
                    INNER JOIN sys_company c ON c.id = a.company_id
                    LEFT JOIN sys_rol r ON ac.rol_id = r.id
                    LEFT JOIN sys_group g ON r.group_id = g.id AND g.type = 'user'
                    WHERE u.id = ".Yii::$app->user->identity->id.";";
            $model = AccessControl::findBySql($sql)->one();
            if($model != NULL)
            {
                Yii::$app->session->set('user.group_id',$model->group_id);
                Yii::$app->session->set('user.group_name',$model->group_name);
                Yii::$app->session->set('user.company_id',$model->company_id);
                Yii::$app->session->set('user.company_name',$model->company_id);
                Yii::$app->session->set('user.rol_id',$model->rol_id);
                Yii::$app->session->set('user.rol_name',$model->rol_id);
                Yii::$app->session->set('user.name_identity',$model->name_identity);
                
                if($model->group_permission != NULL || $model->group_permission != '""'){
                    $array_group_permission = Json::decode($model->group_permission);
                }
                if($model->rol_permission != NULL || $model->rol_permission != '""'){
                    $array_rol_permission = Json::decode($model->rol_permission);
                }
                if($model->user_permission != NULL || $model->user_permission != '""'){
                    $array_user_permission = Json::decode($model->user_permission);
                }
                $permissions = ($array_user_permission + $array_rol_permission + $array_user_permission);
                Yii::$app->session->set('user.permissions',$permissions);
                return true;
            }else{return false;}
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
