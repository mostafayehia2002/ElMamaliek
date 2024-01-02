console.log("ok");
 let setting = document.querySelector(".setting");
 let dashboard = document.querySelector(".Dashboard");
 let section=document.querySelector(".container1");
 console.log(setting);
console.log(dashboard);
 setting.onclick = () => {
    section.classList.toggle("show");
     dashboard.classList.toggle("hidden");
 }
/*************/
//
let inputUpload = document.getElementById("userPhoto");
 let  image = document.querySelector(".photo");
 if (inputUpload) {

     const imageSrc = image.getAttribute("src");
          inputUpload.onchange = () => {
         let reader = new FileReader();
        if (inputUpload.files[0]) {
             reader.readAsDataURL(inputUpload.files[0]);
            // inputUpload.value('imageSrc');
         } else {
             image.setAttribute("src", imageSrc);
             image.classList.remove("show");
         }

        reader.onload = () => {
             image.setAttribute("src", reader.result);
              image.classList.add("show");
};
    };
 }
/****************/
let message=document.querySelectorAll('.message');
if( message){
    setTimeout(()=>{
        message.forEach((e)=>{
            e.style.display="none";
        })

    },3000)
}

new DataTable('#example');

/****************************************/
//notification action
let dropdown_notification= document.querySelector('.notification-menu .notification-dropdown');
let btn_notification=document.querySelector('.notification-menu>a');
btn_notification.onclick=function (){
    setTimeout(function (){
      if(  dropdown_notification.classList.contains('active')){
          dropdown_notification.classList.remove('active');
      }else{
          dropdown_notification.classList.add('active');
      }
    },300);
}
