/**
Validate an email address.
Provide email address (raw input)
Returns true if the email address has the email 
address format and the domain exists.
*/
function isEmailValid($email)
{
	var $isValid;
	var $atIndex;
	var $domain;
	var $local;
	var $localLen;
	var $domainLen;
	
	// reg exp patterns
	var rep_dbldot = /\.\./;
	var rep_domainchars = /^[A-Za-z0-9\-\.]+$/;
	var rep_localchars  = /[A-Za-z0-9.!@#$%^&*_+-=\/?{|}`~\']+$/;
	
		$isValid = true;
		$atIndex = $email.lastIndexOf("@");
		if ($atIndex == -1)	// not found
		{
		  $isValid = false;
		}
		else if ( rep_dbldot.exec($email) == '\.\.' )
		{
		   // email contains consecutive dots
		   $isValid = false;
		}
   else
   {
      $domain = $email.substr($atIndex + 1);	// substr($email, $atIndex+1);
      $local = $email.substr(0,$atIndex);			// substr($email, 0, $atIndex);
      $localLen = $local.length; 							// strlen($local);
      $domainLen = $domain.length;						// strlen($domain);
      //
      // Check validity of domain portion
      if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ( $domain != rep_domainchars.exec( $domain ) )
      {
         // character not valid in domain part
         $isValid = false;
      }
      //
			// Check validity of local portion
      else if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($local.charAt(0) == '.' || $local.charAt($localLen-1) == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if ( $local != rep_domainchars.exec( $local ) )
      {
         // NOTE: THIS FUNCTION DOES NOT CHECK FOR QUOTED PORTIONS, 
         //       WHICH MAY BE VALID
         // local part contains an invalid character
         {
            $isValid = false;
         }
      }
      // NOTE: This function does not check the actual domain specified 
      //       against a DNS. 
   }
   return $isValid;
}
