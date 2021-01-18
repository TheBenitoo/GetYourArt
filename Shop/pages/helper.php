<?php
require_once './includes/functions.php';
const FILEPATH = './includes/persons.txt';

if(isset($_POST['sendForm']))
{
    if(!empty($_POST['fname'])
    && !empty($_POST['lname'])
    && !empty($_POST['username'])
    && !empty($_POST['email']))
    {
        $fullName = htmlspecialchars($_POST['fname'] . ' ' . $_POST['lname']);
        $username  = htmlspecialchars($_POST['username']);
        $eMail    = htmlspecialchars($_POST['email']);

        $check = [',','>','<'];
        $checkUsername = [',' , '<' , '>' , ' ' , '/' , '§' , '!' , '§' , '='];
        if(validateInput($fullName,$check)
        && validateInput($username, $checkUsername)
        && validateInput($eMail,   $check))
        {

        switch($_POST['salutation'])
        {
            case 'male':
            $salutation = 'Herr';
            break;
            case 'female':
            $salutation = 'Frau';
            break;
            default:
            $salutation = '-';
            break;
        }
        $data = $salutation . ',' . $fullName . ',' . $username . ',' . $eMail;

        $file = fopen(FILEPATH,'a+');

        fwrite($file, $data.PHP_EOL);

        fclose($file);
    }
    else 
    {
        $error = 'Ihre Eingabe dürfen keine der folgenden Sonderzeichen beinhalten: <br>';
        foreach($check as $checkValue)
        {
            $error .= ' ' . $checkValue . ' ';
        }

        foreach($checkUsername as $checkValueUsername)
        {
            $error .= ' ' . $checkValueUsername. ' ';
        }
    }
    
    }
    else 
    {
        $error = 'Alle Felder müssen ausgefüllt sein!';
    }
}