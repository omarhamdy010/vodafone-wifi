const success =()=>{
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Login Successfully",
        showConfirmButton: false,
        timer: 1000,
      });
}
const error =(mes , image)=>{
    Swal.fire({
      imageUrl: image, // Correct way to include asset in JavaScript
      imageWidth: 109.34,                   // You can adjust the size as needed
      imageHeight: 109.34,
      imageAlt: 'Custom error icon',    // Alt text for the image
      position: "center",
      title: mes,
      confirmButtonText: "OK"
      });
}
