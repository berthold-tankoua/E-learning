
 <!doctype html>
 <html>
 <head>
     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
 <style>
 *{
     margin: 0;
     padding: 0;
     box-sizing: border-box;
 }
 body{font-family: Arial, Helvetica, sans-serif;padding: 20px;width: 100%;}
 .header{
     width: 100%; 
     padding: 20px;  
 }
 .txt_title{
     width: 100%;
     align-items: center;
     text-align: center;
     margin-bottom: 25px;
 }
 .txt_title h1{
     font-size: 55px;
     color: rgb(39, 38, 38);
 }
  .img{
      width: 100%;
     margin-bottom: 5px;
     align-items: center;
     text-align: center;
 }
 .mail_custom .header .txt_title h1{
     margin-top: 25px;
     font-size: 30px;
     color: rgb(53, 51, 51);
 }
 .img img{
     width: 100px;
     height: 100px;
     margin-bottom: 10px;
     height: 125px;
     text-align: center;
 }
 .body{
     background-color: white;
     padding: 5px;
     padding-left: 25px;
     padding-right: 25px;
     margin-bottom: 5px;
 }
 .body h1{
     color: rgb(26, 25, 25);
     font-weight: 500;
     font-size: 16.5px;
     margin-bottom: 15px;
     text-transform: capitalize;
 }
 .body p{
     color: rgb(43, 41, 41);
     font-weight: 500;
     font-size: 16px;
     margin-bottom: 15px;
 }
 
 .footer .social{
     text-align: center;
     align-items: center;
     width: 100%;
     margin-bottom: 5px;
     margin-left: 20px;
     justify-content: center;
 }
 .rights{
     width: 100%;
     margin-top: 15px;
     margin-bottom: 15px;
     text-align: center;
     color: rgb(43, 41, 41);
     font-weight: 500;
     font-size: 17.5px;
 }
 .rights p{
     color: rgb(43, 41, 41);
     font-weight: 500;
     font-size: 17.5px;
 }
 .footer .social a img{
     width: 25px;
     height: 25px;
     margin-right: 30px;
     cursor: pointer;
 }
 .notifmail{
     text-align: center;
 }
 .notifmail p{
   
     margin-bottom: 8px;
     color: rgb(43, 41, 41);
     font-weight: 500;
     font-size: 16px;
 }
 .notifmail a{
     font-weight: 500;
     font-size: 16px;
     cursor: pointer;
     color: red;
 }
 .contact p{
     color: rgb(107, 104, 104);
 }
 .txt_title span{
     color: red;
 }
 a{
     cursor: pointer;

 }
 </style>
 </head>
 <body>
     <div class='img'>
     <center>
      <h1></h1>
    </center>
     </div>
     <div class='txt_title'>
         <h1 style='text-align: center;'><span>E </span>- Learning</h1>
     </div>
     <div class='body'>
         <h1>Cher {{$regisInfo['name']}}</h1>
         <p>Bienvenue sur notre Plateforme.
           Nous esperons que vous serez satisfait des services que offre notre plateforme.
           </p>
           <P>Pour tout probleme ou préoccupation veuillez contacter l'une des adresses ci dessous:</P>
         <div class='contact' style='margin-top: 18px;'>
             <p>Email : <span>Brtankoua@gmail.com</span></p>
             <p>Contact : <span>694011998</span></p>
             <p>Addresse : <span>Cameroun/Yaounde</span></p>
         </div>
         <p style='text-align: right;'>@copyright 2022</p>
     </div>
 <div class='footer'>
     <center>
     <div class='social'>
        <a target="_blank" rel="noopener noreferrer" href="https://github.com/TankouaBrecht"><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Octicons-mark-github.svg/800px-Octicons-mark-github.svg.png' alt=''></a>
        <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/agencedigitals"><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Facebook-icon-1.png/600px-Facebook-icon-1.png' alt=''></a>
        <a target="_blank" rel="noopener noreferrer" href="https://wa.me/694011998/?text= Je souhaite en savoir plus"><img src='https://upload.wikimedia.org/wikipedia/commons/1/19/WhatsApp_logo-color-vertical.svg' alt=''></a>
     </div>
    </center>
 </div>
 <div class='rights' style='text-align: center;'>
     <p style='text-align: center;'>Tout droit reservé à AgenceDigitals</p>
  </div><br>
 <div class='notifmail'>
     <p>Vous avez recu ce mail, car vous vous etes inscrit sur notre plateforme E-learning</p>
     <a href='' style="cursor: pointer;">Cliquer ici pour vous désinscrire</a>
 </div>
 </body>
 </html>
