 <!doctype html>
 <html lang="en">

 <head>
 </head>

 <body>
     <div class="container" style=" width: 50vw;">

         <table class="table">
             <tr>
                 <td>From: </td>
                 <td>{{$name}}</td>
             </tr>
             <tr>
                 <td>Email: </td>
                 <td>{{$email}}</td>
             </tr>
             <tr>
                 <td>Subject: </td>
                 <td>{{$subject}}</td>
             </tr>
         </table>

         <div style="border: 1px solid #e5e5e5; border-radius: 4px; padding: 30px 20px">{{ $messages }}</div>

     </div>

 </body>

 </html>