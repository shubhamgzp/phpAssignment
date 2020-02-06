function formValidation(form)
{
	var email=document.getElementById('email').value;
	console.log(email);
	document.getElementById('errorEmail').innerHTML='';
	if(! (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) )
	{  

		document.getElementById('errorEmail').innerHTML='input valid email*';
		flag=false;

	}
	// receive value of password
	var password=document.getElementById('password').value;
	document.getElementById('errorPassword').innerHTML='';
	if(password.length<6)
	{
		document.getElementById('errorPassword').innerHTML='AT least 6 characters are mandatory *';
		flag=false;
	}
	if(flag==false)
	{
		return false;
	}
	else
	{
		return true;
	}


}
 function profileValidation(form)
{
	var flag=true;
	console.log('inside');
	var name=document.getElementById('name').value;
	if(name=='')
	{
		flag=false;
		document.getElementById('errorName').innerHTML='name is required*';
	}
	else
	{
		document.getElementById('errorName').innerHTML='';
	}
	var mobNo=document.getElementById('mobNo').value;
	if(mobNo=='')
	{
		flag=false;
		document.getElementById('errorMobNumber').innerHTML='mobile number is requiredddddddddddddddd*';
	
	}
	else if( (mobNo.length!=10) || isNaN(mobNo) )
	{
		flag=false;
		document.getElementById('errorMobNumber').innerHTML='input valid number*';
	}
	else
	{
		document.getElementById('errorMobNumber').innerHTML='';
	}
	
	
	var state=document.getElementById('state').value;
	if(state=='')
	{
		flag=false;
		document.getElementById('errorState').innerHTML='select your state*';
	}
	else
	{
		document.getElementById('errorState').innerHTML='';	
	}

	var age=document.getElementById('age').value;
	var ageFlag=0
	console.log(age);
	if(age=='')
	{
		flag=false;
		document.getElementById('errorAge').innerHTML='input your age*';
		ageFlag=1;
	}
	else if( (age<20 || age>30) && (ageFlag==0) )
	{
		flag=false;
		document.getElementById('errorAge').innerHTML='age must be between 20 to 30*';
	}
	else
	{
		document.getElementById('errorAge').innerHTML='';	
	}
	

	var arr =	document.getElementsByClassName('gender');	

	if(arr[0].checked ==false && arr[1].checked ==false && arr[2].checked ==false)
	{
		flag=false;
		document.getElementById('errorGender').innerHTML='select gender*';
	}
	else
	{
		document.getElementById('errorGender').innerHTML='';
	}

	var arr = document.getElementsByClassName('check');
	if(!(arr[0].checked ==true && arr[1].checked ==true  || arr[1].checked ==true  && arr[2].checked ==true 
		|| arr[0].checked ==true && arr[2].checked ==true))
	{
		flag=false;
		document.getElementById('errorSkills').innerHTML='select atleast 2 skills';
	}
	else
	{
		document.getElementById('errorSkills').innerHTML='';
	}

	var profilePicture = document.getElementById('profilePicture').value;
	if(profilePicture=='')
	{
		flag=false;
		document.getElementById('errorProfilePicture').innerHTML='upload your profile picture*';
	}	
	else
	{
		document.getElementById('errorProfilePicture').innerHTML='';
	}

	var resume = document.getElementById('resume').value;
	if(profilePicture=='')
	{
		flag=false;
		document.getElementById('errorResume').innerHTML='upload your Resume*';
	}	
	else
	{
		document.getElementById('errorResume').innerHTML='';
	}
	
	if(flag==false)
	{	
		return false;
	}
	else
	{
		return true;
	}	
}

      
    