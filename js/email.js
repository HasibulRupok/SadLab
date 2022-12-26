function sendEmail(){
    let emailText = prompt("Please enter your email", "...@gmail.com");
    if(emailText.includes("@") && emailText.includes(".")){
        const serviceID = "service_ljmz72e";
        const templateID = "template_tu1pu2u";

        let params = {
            email: emailText
        };
        emailjs
            .send(serviceID, templateID, params)
            .then( (res) =>  {
                // console.log(res);
                // alert("Email send successfully");
                window.open("https://paymentdemo.aamarpay.com/paymentdemo.php?demo");
            })
            .catch((err)=>{
                console.log(err);
            })
    }
    else{
        window.alert("Invalid Email");
    }
}

