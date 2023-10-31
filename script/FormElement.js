// Api's
let PHPapiValidateLogin = "api/apiValidateLogin.php";
let PHPapiGenerateExam = "api/apiGenerateExam.php";

// Views
let viewTeacher = document.querySelector("div[name='viewTeacher']");
let viewStudent = document.querySelector("div[name='viewStudent']");

// Login Form
let formLogin = document.querySelector("form[name='examinator-login']");
let formDivLogin = document.querySelector("div[name='login']");
let name = document.querySelector("div[name='login'] input[name='name']");
let password = document.querySelector("div[name='login'] input[name='password']");
let lblLoginError = document.querySelector("div[name='login'] input[name='password']");;
let btnLogin = document.querySelector("div[name='login'] input[name='login']");

// View Teacher
let lblViewTeacherError = document.querySelector("div[name='viewTeacher'] label[name='feedback']");;
let btnGenerateExam = document.querySelector("div[name='viewTeacher'] button[name='generateExam']");



