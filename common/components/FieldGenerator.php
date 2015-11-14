<?php

namespace common\components;
 
use Yii;
use yii\base\Component;
use yii\helpers\Html;

class FieldGenerator extends Component
{
  public function genStaticInput($model,$array,$modelGeneric=NULL) 
  {
    $content = $optionsInput = NULL;
    foreach ($array as $key => $attribute) 
    {
        $content = NULL;
        foreach ($array as $key => $attribute) 
        {
          $optionsInput = NULL;  
          $arrayValues = NULL;  
          if(is_null($modelGeneric)){$modelGeneric=get_class($model);}
          $input = $this->genStaticField($attribute,$modelGeneric);
          foreach ($input as $keyOption => $option) {
              if($keyOption == 'type'){$type = $option;}
              if($keyOption == 'values'){$arrayValues = $option;}
              else{$optionsInput .= ' '.$keyOption.'="'.$option.'"';}
              // More Exceptions of Attributes ...
          }
          $content .= '<div class="form-group form-md-line-input '.strtolower($modelGeneric).'-'.str_replace('_', '-', $attribute).'">'; 
              $content .= $this->constructStaticInput($modelGeneric,$type,$attribute,$optionsInput,$arrayValues);
              $content .= '<label class="control-label" for="'.strtolower($modelGeneric).'-'.$attribute.'" translate>'.$this->genNameLabel($attribute).'</label>';
          $content .= '</div>';
        }
        return $content;
    }
    return $content;
  }
  
  public function genDynamicList($modelGeneric,$attribute,$optionsSelect,$arrayValues) 
  {
        $select = '';
        $select .= '<select id="'.strtolower($modelGeneric).'-'.$attribute.'" '.$optionsSelect.' name="'.$modelGeneric.'['.$attribute.']" class="form-control select2me">';
        $select .= '<option value="">-- Seleccionar '.$this->genNameLabel($attribute).' --</option>';
        if($arrayValues != NULL){
            foreach ($arrayValues as $key => $value) {
                if($value != NULL && $value != ''){
                    $select .= '<option value="'.$key.'">'.$value.'</option>';
                }
            }
            $select .= '</select>';
            return $select;
        }
  } 
    
  public function constructStaticInput($modelGeneric,$type,$attribute,$optionsInput,$arrayValues=NULL) 
  {
        $input = '';
        switch ($type) 
        {
          case 'text':
            $input .= '<input type="text" id="'.strtolower($modelGeneric).'-'.$attribute.'" '.$optionsInput.' name="'.$modelGeneric.'['.$attribute.']">';
          break;
          case 'email':
            $input .= '<input type="email" id="'.strtolower($modelGeneric).'-'.$attribute.'" '.$optionsInput.' name="'.$modelGeneric.'['.$attribute.']">';
          break;
          case 'number':
            $input .= '<input type="text" class="form-control mask_number mask_phone" id="'.strtolower($modelGeneric).'-'.$attribute.'" '.$optionsInput.' name="'.$modelGeneric.'['.$attribute.']">';
          break;
          case 'date':
            $input .= '<input type="text" id="'.strtolower($modelGeneric).'-'.$attribute.'" '.$optionsInput.' name="'.$modelGeneric.'['.$attribute.']">';
          break;
          case 'textarea':
            $input .= '<textarea id="'.strtolower($modelGeneric).'-'.$attribute.'" '.$optionsInput.' name="'.$modelGeneric.'['.$attribute.']"></textarea>';
          break;
          case 'list':
            $input .= $this->genDynamicList($modelGeneric,$attribute,$optionsInput,$arrayValues);
          break;
          //Default Input Text
          default:
            $input .= '<input type="text" id="'.strtolower($modelGeneric).'-'.$attribute.'" '.$optionsInput.' name="'.$modelGeneric.'['.$attribute.']">';
          break;
        }
        return $input;
  }
    
  public function genStaticField($attribute) 
  {
        $field_list_values = ['text'=>'Campo Texto','number'=>'Campo Numerico','phone'=>'Campo Telefónico','email'=>'Campo Email','date'=>'Campo Fecha','ip'=>'Campo IP','textarea'=>'Area de Texto','list'=>'Lista Desplegable'];
        $field_list_nationality = ['Venezolano','Estadounidese','Argentina','Peruana','Colombiana','Cubana','Mexicana','Canadiense','Española','Italiana','Francesa','Alemana','Portuguesa','Brasilera','Chileno','Austriaco'];
        $fields = [
            'first_name' => ['type'=>'text', 'class'=>'form-control'],
            'second_name' => ['type'=>'text', 'class'=>'form-control'],
            'first_surname' => ['type'=>'text', 'class'=>'form-control'],
            'second_surname' => ['type'=>'text', 'class'=>'form-control'],
            'gender' => ['type'=>'text', 'class'=>'form-control'],
            'birth_date' => ['type'=>'date', 'class'=>'form-control form-control-inline input-medium date-picker'],
            'nacionality' => ['type'=>'list', 'class'=>'form-control', 'values'=>$field_list_nationality],
            'corporate_address' => ['type'=>'textarea', 'rows'=>'5', 'cols'=>'50', 'class'=>'form-control'],
            'personal_address' => ['type'=>'textarea', 'rows'=>'5', 'cols'=>'50', 'class'=>'form-control'],
            'corporate_skype' => ['type'=>'text', 'class'=>'form-control'],
            'corporate_phone' => ['type'=>'number', 'class'=>'form-control'],
            'corporate_mobile_phone' => ['type'=>'number', 'class'=>'form-control'],
            'corporate_email' => ['type'=>'email', 'class'=>'form-control'],
            'personal_address' => ['type'=>'textarea', 'rows'=>'4', 'cols'=>'50', 'class'=>'form-control'],
            'personal_skype' => ['type'=>'text', 'class'=>'form-control'],
            'personal_phone' => ['type'=>'number', 'class'=>'form-control mask_number mask_phone'],
            'personal_mobile_phone' => ['type'=>'number', 'class'=>'form-control'],
            'personal_email' => ['type'=>'email', 'class'=>'form-control'],
            'contact_person' => ['type'=>'text', 'class'=>'form-control'],
            'contact_method' => ['type'=>'list', 'class'=>'form-control select2me', 'values'=>['Teléfono','Correo Electrónico','']],
            'contact_device' => ['type'=>'text', 'class'=>'form-control'],
            'field_name' => ['type'=>'text', 'class'=>'form-control'],
            'field_type' => ['type'=>'list', 'class'=>'form-control select2me', 'values'=>$field_list_values],
            'field_values' => ['type'=>'text', 'class'=>'form-control tags'],  
        ];
        return $fields[$attribute];
  }

  public function genNameLabel($attribute) 
  {
    $label = [
      'first_name' => 'Nombres',
      'second_name' => 'Segundo nombre',
      'first_surname' => 'Apellidos',
      'second_surname' => 'Segundo apellido',
      'gender' => 'Sexo',
      'birth_date' => 'Fecha de nacimiento',
      'nacionality' => 'Nacionalidad',
      'corporate_phone' => 'Teléfono corporativo',
      'corporate_mobile_phone' => 'Teléfono móvil corporativo',
      'corporate_skype' => 'Skype corporativo',
      'corporate_email' => 'Correo electrónico corporativo',
      'corporate_address' => 'Dirección corporativa',
      'personal_phone' => 'Teléfono personal',
      'personal_mobile_phone' => 'Teléfono móvil personal',
      'personal_skype' => 'Skype personal',
      'personal_email' => 'Correo electrónico personal',
      'personal_address' => 'Dirección personal',
      'contact_person' => 'Nombre de la Persona de Contacto',
      'contact_method' => 'Medio de Comunicación',
      'contact_device' => 'Dispositivo de Origen',
      'field_name' => 'Nombre del Campo',
      'field_type' => 'Tipo de Campo',
      'field_values' => 'Valores',
    ];
    return $label[$attribute];
  }
}