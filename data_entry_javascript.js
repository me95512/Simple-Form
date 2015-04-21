// JavaScript Document developed  by Mikalonet
function validate()
{
 
   if( document.thetestForm.Name.value == "" )
   {
     alert( "Please provide your name!" );
    if (document.thetestForm.Name.input) ;
     return;
   }
   if( document.thetestForm.Surname.value == "" )
   {
     alert( "Please provide your surname!" );
     document.thetestFormSurname.focus() ;
     return true;
   }
   if( document.thetestForm.Email.value == "" )
   {
     alert( "Please provide your email!" );
     document.thetestFormEmail.focus() ;
     return true;
   }
  if( document.thetestForm.Telephone.value == "" ||
           isNaN( document.thetestForm.Telephone.value ) ||
           document.thetestForm.Telephone.value.length != 11 )
   {
     alert( "Please provide 11 digit Telephone number in the numeric format ." );
     document.thetestForm.Telephone.focus() ;
     return true;
   }
   if( document.thetestForm.Gender.value == "-1" )
   {
     alert( "Please provide your Gender!" );
     return true;
   }
    if( document.thetestForm.DOB.value == "" )
   {
     alert( "Please provide your DOB!" );
     document.thetestFormDOB.focus() ;
     return true;
   }
    if( document.thetestForm.Comments.value == "" )
   {
     alert( "Please provide your Comments!" );
     document.thetestFormComments.focus() ;
     return true;
   }

   return( true );
}
