

$(document).ready(function(){
  $(document).on('click', '.remove-from-user-cart', function()
  {

    let id_cart = $(this).data('id')

    $.ajax({
      url : url_removeFromCart,
      method : 'post',
      dataType : 'json',
      data : {
        id : id_cart,
        _token : $("input[type='hidden']").val()
      },
      success : function(data)
      {
        
        if(data.user_cart == null)
        {

          $("#user_cart").html("<tr><td  class='text-center' colspan='5'>Your cart is empty!</td></tr>")
        }

        else {

          fillCart(data.user_cart)

        }
      },
      error : function(err, status, responseText)
      {
        console.log(status)
      }


  })

})

function fillCart(data)
{


  let x = ``;
  let price = 0 ;
  let final_price;
  for(let d of data)
  {
    x +=

    `
    <tr>

    <td>${d.user_cart_ID}</td>

    <td class='text-capitalize'>${d.name}</td>

    <td>${d.date}</td>

    <td>1</td>
    <td>${d.price} $</td>`;

    price += Number(d.price);

    x += `

    <td ><a class='remove-from-user-cart' data-id='${d.user_cart_ID}'>Remove</a></td>
    </tr>

    `
  }

  x += `
  <tr>
    <td  class='text-center' colspan='6'>Total: ${price} $</td>
  </tr>
  <tr>
    <td  class='text-center' colspan='6'><a class="" href="${url_checkout}">Checkout</a></td>
  </tr>
  `;
  $("#user_cart").html(x);

}

})


















// ajax - filter categories ---------------------------------->
$(document).ready(function(){

  $(document).on('click', '.category-filter', function(e){
    e.preventDefault();

    let category_id = $(this).data('id');

    $.ajax({
      url : url_filterProductsByCategory,
      method : 'post',
      dataType : 'json',
      data : {
        category_id : category_id,
        _token : $("input[name='_token']").val()
      },
      success: function(data)
      {

        filterProductsByCategory(data);
      },
      error : function(xhr, status, responseText)
      {
        console.log(status)
      }


    });

    function filterProductsByCategory(data)
    {
      let x = ``;

      for(let d of data){
      x +=

      `
      <div class="col-sm-6 col-md-4 col-lg-3 p-b-75 isotope-item fruit-fill">
        <!-- Block1 -->
        <div class="block1">
          <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
            <img src="/main/images/${d.categoryName}/${d.path}">

            <div class="block1-content flex-col-c-m p-b-46">


              <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                <a href="/products/${d.product_ID}" class="block1-icon flex-c-m wrap-pic-max-w">
                <i class="fa fa-search" aria-hidden="true"></i>
                </a>


              </div>
            </div>
          </div>
        </div>
      </div>

      `;
    }
    $("#ajaxProductsByCategory").html(x);

  }
  });

});
// ---------------------------------->
var reEmail = /^[A-z\d]{2,}(\.?(\W\D)?[A-z\d]{2,})*\@\w{2,}(\.\w{2,})(\.\w{2,})*$/;
var reUsername = /^([a-z]\d*\_*){3,8}$/;
var rePassword = /([A-z]\d*\W*){5,15}/;

var reName = /^[A-z]{3,10}(\s[A-z]{3,10})*$/;
var rePhone = /^\+1[0-9]{6,10}$/;
var reAddress = /^([A-z]+\s*\d*){5,30}/;

var reProduct = /^([A-z](\s[A-z])*){3,30}$/;
var reCategory= /^([A-z](\s[A-z])*){3,15}$/;
var rePrice = /^[1-9]\d?\.[1-9]\d$/;
var reDescription = /([A-z]\d*\W*){5,200}/;

  function validateLogin() {

    let flag = 0;

    let username_value = $('#login-username').val();
    let password_value = $('#login-password').val();

    // if(!reUsername.test(username_value))
    // {
    //
    //   if(username_value == '')
    //   {
    //     $('#login-username-error').html('Username is requred!')
    //   }
    //
    //   else {
    //     $('#login-username-error').html('Username is not in good format!')
    //   }
    //
    //
    //   flag++;
    //
    //
    // }
    //
    // else {
    //
    //   $('#login-username-error').html('')
    // }
    //
    //
    // if(!rePassword.test(password_value))
    // {
    //   if($('#login-password').val() == '')
    //   {
    //     $('#login-password-error').html('Password is requred!')
    //   }
    //
    //   else {
    //     $('#login-password-error').html('Password is not in good format!')
    //   }
    //   flag++;
    //
    // }
    //
    // else {
    //
    //   $('#login-password-error').html('')
    // }

    if(flag > 0)
    {
      return false;
    }


    if(flag == 0)
    {
      return true;
    }





}


function validateResetPass()
{


  let email = $("#email_reset_pass").val()
  let email_verify = $("#email-re-enter-reset-pass").val()

  let flag = 0;

  // return true;
  //
  // if(!reEmail.test(email))
  // {
  //   $("#email-reset-pass-error").text('E-mail is not in good format!')
  //   flag++;
  // }
  //
  // else {
  //   $("#email-reset-pass-error").text('')
  // }
  //
  // if(!reEmail.test(email_verify))
  // {
  //   $("#email-re-enter-reset-pass-error").text('E-mail is not in good format!')
  //   flag++;
  // }
  //
  // else {
  //   $("#email-re-enter-reset-pass-error").text('')
  // }

  if(flag > 0)
  {
    return false;
  }
  else {

    if(email != email_verify)
    {
      $("#email-re-enter-reset-pass-error").text('E-mails must be the same!')
      return false;
    }
    else {
      return true;
    }

  }


}

function validateChangePass()
{
  let flag = 0;

  let password = $("#new_password").val()
  let password_verify = $("#new_password_verify").val()

  // if(!rePassword.test(password))
  // {
  //   flag++;
  //   $("#new_password_error").text('Password is not in good format!')
  // }
  //
  // else {
  //   $("#new_password_error").text('')
  // }
  //
  // if(!rePassword.test(password_verify))
  // {
  //   flag++;
  //   $("#new_password_error_verify").text('Password is not in good format!')
  // }
  //
  // else {
  //   $("#new_password_error_verify").text('')
  // }
  //
  if(flag == 0)
  {
    if(password == password_verify)
    {
      return true;
    }

    else {
      $("#new_password_error_verify").text('Passwords must be the same!');
      return false;
    }
  }

  else {
    return false;
  }

  // return true;


}

$('#add-to-cart').on('click', function(){

  let product_ID = $(this).data('id')
  let user_id = $("#user-id-session").val()

  let xhr = new XMLHttpRequest();

  let formData = new FormData()
  formData.append('product_id', product_ID)
  formData.append('user_id', user_id)
  formData.append('_token', $("input[type='hidden']").val())

  xhr.open('post', url_addToCart, true)
  xhr.send(formData)

  xhr.onload = function(response)
  {
    let data = JSON.parse(xhr.response)

    if(data.inserted)
    {
      window.location.href='\\shopping_cart';
    }
  }
})


// ---------------------------------->

function validateRegister()
{


  let flag = 0;

  let username_value = $('#register-username').val();
  let password_value = $('#register-password').val();
  let email_value = $('#register-email').val();

  //
  // if(!reEmail.test(email_value))
  // {
  //   if(email_value == '')
  //   {
  //     $('#register-email-error').html('Email is requred!')
  //   }
  //
  //   else
  //   {
  //     $('#register-email-error').html('Email is not in good format!')
  //   }
  //
  //
  //   flag++;
  // }
  //
  // else {
  //   if(email_value.length > 30)
  //   {
  //     $('#register-email-error').html('Email is too long!')
  //     flag++;
  //     console.log(flag)
  //   }
  //   else {
  //     $('#register-email-error').html('');
  //     console.log(flag)
  //   }
  //
  // }
  //
  // if(!reUsername.test(username_value))
  // {
  //   if(username_value == '')
  //   {
  //     $('#register-username-error').html('Username is requred!')
  //   }
  //
  //   else {
  //     $('#register-username-error').html('Username is not in good format!')
  //   }
  //   flag++;
  // }
  //
  // else {
  //   $('#register-username-error').html('');
  // }
  //
  // if(!rePassword.test(password_value))
  // {
  //   if(password_value == '')
  //   {
  //     $('#register-password-error').html('Password is requred!')
  //   }
  //
  //   else {
  //     $('#register-password-error').html('Password is not in good format!')
  //   }
  //   flag++;
  // }
  //
  // else {
  //   $('#register-password-error').html('');
  // }

  if(flag > 0)
  {
    return false;
  }


  if(flag == 0)
  {
    return true;
  }




}
// ---------------------------------->
var img_value; // account image
$('#upload-img-account').on('click', function(){
  check_img();


})
function check_img()
{

  $('#file-img-account').click();


  $('#remove-img-account').on('click', function(){
    $('#img-path').text('')

  })

  $('#file-img-account').on('change', function(){
     img_value = $('#file-img-account').val();
     var final_path_add_account_img = img_value.split('\\');
    $('#img-path').text(final_path_add_account_img[2])
  })

}
  $('#update-account').on('click', function(){


    // if($('#img-path').text() != '')
    // {
    //
    //   let valid = ['jpg', 'jpeg', 'png', 'gif'];
    //   let image_path = img_value.split('\\');
    //
    //
    //   let image_split_ = image_path[2];
    //
    //
    //
    //   let image_extension = image_split_.split('.')
    //
    //
    //
    //
    //
    //   if(valid.includes(image_extension[1])){
    //
    //
    //
    //     let file_size =$('#file-img-account')[0].files[0].size;
    //
    //
    //
    //     if(file_size > 2000000)
    //     {
    //       $('#img-path').text('Please upload less than 2MB!');
    //
    //
    //     }
    //
    //     else {
    //
    //       sendAjaxCall();
    //     }
    //
    //   }
    // }
    sendAjaxCall()
      // sendAjaxCall();
      function sendAjaxCall(){
        let xhr = new XMLHttpRequest();

        let formData = new FormData();


        let file = document.getElementById('file-img-account').files[0];
        let _token = $("input[name='_token']").val();
        let user_id = $('#file-img-account').data('id')

        formData.append('image', file);
        formData.append('_token', _token);
        formData.append('user', user_id);

        xhr.open('post', url_updateUser, true);
        xhr.send(formData);

        xhr.onload = function()
        {
          if(this.responseText)
          {
            $('#img-path').html(this.responseText);
          }

          else {
            window.location.href = '/account';
          }




        }


      }











  });


  // add product
$(document).ready(function(){
  var final_add_img_path_product;
  $(document).on('click', '#add-product-image-btn', function(){
    $("#product-file").click()
  });

  $(document).on('change', '#product-file', function(){
    let value_img = $("#product-file").val();
     final_add_img_path_product = value_img.split('\\')
    $('#add-product-image-error').html(final_add_img_path_product[2])
  })
  $(document).on('click', '#add-product-btn', function(){



    let flag = false;
    let name = $('#product-name').val();
    let price = $('#product-price').val();
    let category_id = $('#product-categories').val();
    let description = $('textarea#product-description').val();
    let image_path = $("#product-file").val();

    let image = $("#product-file")[0].files[0];


    //
    //
    // if(image_path != '')
    // {
    //   let image_size = image.size;
    //   let image_type = image.type;
    //
    //   let max_size = 2000000; // 2MB -> 2 000  000 bytes // JS returns the size in bytes
    //   let allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    //   if(image_size > max_size){
    //     $('#add-product-image-error').text('Please not above 2MB!')
    //     flag = true;
    //   }
    //
    //   else {
    //     $('#add-product-image-error').html(final_add_img_path_product[2])
    //
    //     if(!allowed_types.includes(image_type))
    //     {
    //       flag = true;
    //       $('#add-product-image-error').text('jpeg, jpg, png, gif')
    //     }
    //
    //     else {
    //       $('#add-product-image-error').html(final_add_img_path_product[2])
    //     }
    //   }
    //
    //
    // }
    //
    // else {
    //   flag = true;
    //   $('#add-product-image-error').text('Please add image!')
    // }
    //
    //
    //
    // if(!reProduct.test(name))
    // {
    //   $("#add-product-name-error").text('Name is not correct!')
    //   flag = true;
    // }
    // else {
    //   $("#add-product-name-error").text('')
    // }
    //
    // if(!rePrice.test(price))
    // {
    //   $("#add-product-price-error").text('Price is not correct!')
    //   flag = true;
    // }
    // else {
    //   $("#add-product-price-error").text('')
    // }
    //
    // if(!reDescription.test(description))
    // {
    //   $("#add-product-description-error").text('Description is not correct!')
    //   flag = true;
    //
    //
    // }
    // else {
    //   if((/[\>\<\*]/).test(description))
    //   {
    //     $("#add-product-description-error").text('<>, * are not allowed!')
    //     flag = true;
    //   }
    //   else {
    //       $("#add-product-description-error").text('')
    //   }
    //
    // }
    //
    // if(category_id == 0) {
    //     $("#add-product-category-error").text('Please choose a category!')
    //     flag = true;
    // }
    //
    // else {
    //   $("#add-product-category-error").text('')
    //
    // }

    if(flag == false)
    {
      let xhr = new XMLHttpRequest();

      let _token = $("input[name='_token']").val();


      let formData = new FormData();

      formData.append('product_name', name);
      formData.append('product_price', price);
      formData.append('_token', _token);
      formData.append('product_category', category_id);
      formData.append('product_description', description);
      formData.append('image', image);

      xhr.open('post', url_addProduct, true);
      xhr.send(formData);

      xhr.onload = function(response)
      {

        if(response.currentTarget.status == 500)
        {
          $("#add-product-error").text('Error happened, please try again later!').fadeOut(3000);
          setTimeout(function(){

            window.location.href = '';
          }, 3000);



        }
        else {


          if(response.currentTarget.status == 201)
          {
            $("#add-product-error").text('Product successfully added!').fadeOut(3000);
            setTimeout(function(){

              window.location.href = '..\\products';
            }, 3000);



          }

          let data = JSON.parse(xhr.responseText);
          if(data.name_error != '')
          {
            $("#add-product-name-error").text(data.name_error)
          }
          else {
            $("#add-product-name-error").text('')
          }

          if(data.price_error != '')
          {
            $("#add-product-price-error").text(data.price_error)
          }
          else {
            $("#add-product-price-error").text('')
          }

          if(data.description_error != '')
          {
            $("#add-product-description-error").text(data.description_error)
          }
          else {
            $("#add-product-description-error").text('')
          }

          if(data.category_error != '')
          {
            $("#add-product-category-error").text(data.category_error)
          }

          else {
            $("#add-product-category-error").text('')
          }
          if(data.image_error != '')
          {
            $("#add-product-image-error").text(data.image_error)
          }

          else {
            $("#add-product-image-error").text(image.name)
          }
        }




    }

    }




  });




})

// add category
$(document).ready(function(){
  $(document).on('click', '#add-category', function(){
    let category_name = $("#add-category-name").val();

    let flag = false;
    //
    // if(!reCategory.test(category_name))
    // {
    //   $("#add-category-error").text('Name is not correct!')
    //   flag = true;
    // }
    //
    // else {
    //   $("#add-category-error").text('')
    // }

    if(flag == false)
    {
      let xhr = new XMLHttpRequest();
      xhr.open('post', url_addCategory, true);
      let formData = new FormData();
      formData.append('category_name', category_name);
      formData.append('_token', $("input[name='_token']").val())
      xhr.send(formData);

      xhr.onload = function(response)
      {
        let data = JSON.parse(xhr.response)

        if(response.currentTarget.status == 201)
        {
          $("#add-category-error-span").text('Category successfully added!').fadeOut(3000);
          setTimeout(function(){

            window.location.href = '..\\categories';
          }, 3000);
        }

        if(data.name_error)
        {
          $("#add-category-error").text(data.name_error)
        }

        else {
          $("#add-category-error").text()
        }
      }

    }


  });

});





// search ajax
$(document).ready(function(){
  $('#search-products-btn').on("click", function(){

    let value = $("#search-product").val();

    $.ajax({
      method : 'post',
      dataType : 'json',
      url : url_searchProduct,
      data: {
        _token : $("input[name='_token']").val(),
        value : value
      },
      success : function(data)
      {

        foundedProductsByName(data);
      },
      error : function(xhr, status, responseText)
      {
        console.log(status)
      }
    })

    function foundedProductsByName(data)
    {
      let x = ``;


      if(data.product != null){

        for(let d of data.product)
        {
          x += `
          <section class="sec-product-detail bg0 p-t-105 p-b-70">
            <div class="container">
              <div class="row">
                <div class="col-md-7 col-lg-6">
                  <div class="m-r--30 m-r-0-lg">
                    <!-- Slide 100 -->
                    <div id="slide100-01">
                      <div class="wrap-main-pic-100 bo-all-1 bocl12 pos-relative">
                        <div class="main-frame">
                          <div class="wrap-main-pic">
                            <div class="main-pic">
                              <img src="/main/images/${d.categoryName}/${d.path}" alt="IMG-SLIDE">
                            </div>
                          </div>
                        </div>


                      </div>

                    </div>
                  </div>
                </div>

                <div class="col-md-5 col-lg-6">
                  <div class="p-l-70 p-t-35 p-l-0-lg">
                    <h4 class="capitalize js-name1 txt-l-104 cl3 p-b-16">
                      ${d.name}
                    </h4>

                    <span class="txt-m-117 cl9">
                      ${d.price}$
                    </span>

                    <div class="flex-w flex-m p-t-30 p-b-27">
                      <span class="fs-16 cl11 lh-15 txt-center m-r-15">
                        <i class="fa fa-star m-rl-1"></i>
                        <i class="fa fa-star m-rl-1"></i>
                        <i class="fa fa-star m-rl-1"></i>
                        <i class="fa fa-star m-rl-1"></i>
                        <i class="fa fa-star m-rl-1"></i>
                      </span>


                    </div>

                    <p class="txt-s-101 cl6">
                      ${d.description}
                    </p>



                    <div class="flex-w flex-m p-t-55 p-b-30">





                    </div>





                    <div class="txt-s-107 p-b-6">
                      <span class="cl6">
                        Category:
                      </span>

                      <span class="cl9">
                        ${d.categoryName}
                      </span>
                    </div>


                  </div>
                </div>
              </div>

          </section>

          `;
        }


        $("#filteredProductsAjax").html(x);

      }

      else {
        $("#filteredProductsAjax").html('');
      }



    }


  });


})

// edit product
$(document).ready(function(){
var final_edit_img_path_product;
$(document).on('click', '#edit-product-image-btn', function(){
  $("#edit-product-file").click()
});

$(document).on('change', '#edit-product-file', function(){
  let value_img = $("#edit-product-file").val();
   final_edit_img_path_product = value_img.split('\\')
  $('#edit-product-image-error').html(final_edit_img_path_product[2])
})

$(document).on('click', '#edit-product-btn', function(){



  let flag = false;

  let name_edit = $('#edit-product-name').val();
  let price_edit = $('#edit-product-price').val();
  let description_edit = $('textarea#edit-product-description').val();
  let image_path_edit = $("#edit-product-file").val();
  let category_id = $("#edit-product-categories").val();
  let _token = $("input[name='_token']").val();
  let product_id = $("#edit-product-btn").data('id');

  let image_edit = $("#edit-product-file")[0].files[0];


  //
  //
  //
  // if(image_path_edit != '')
  // {
  //   let image_size = image_edit.size;
  //   let image_type = image_edit.type;
  //
  //
  //
  //   let max_size = 2000000;
  //   let allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
  //
  //   if(image_size > max_size){
  //
  //     flag = true;
  //     $('#edit-product-image-error').text('Please not above 2MB!');
  //
  //   }
  //
  //   else {
  //     $('#edit-product-image-error').html(final_edit_img_path_product[2])
  //
  //     if(!allowed_types.includes(image_type))
  //     {
  //       flag = true;
  //       $('#edit-product-image-error').text('jpeg, jpg, png, gif')
  //     }
  //
  //     else {
  //       $('#edit-product-image-error').html(final_edit_img_path_product[2])
  //     }
  //   }
  //
  //
  // }
  //
  // if(!reProduct.test(name_edit))
  // {
  //   $("#edit-product-name-error").text('Name is not correct!')
  //   flag = true;
  // }
  // else {
  //   $("#edit-product-name-error").text('')
  // }
  //
  // if(!rePrice.test(price_edit))
  // {
  //   $("#edit-product-price-error").text('Price is not correct!')
  //   flag = true;
  // }
  // else {
  //   $("#edit-product-price-error").text('')
  // }
  //
  // if(!reDescription.test(description_edit))
  // {
  //   $("#edit-product-description-error").text('Description is not correct!')
  //   flag = true;
  //
  //
  // }
  // else {
  //   if((/[\>\<\*]/).test(description_edit))
  //   {
  //     $("#edit-product-description-error").text('<>, * are not allowed!')
  //     flag = true;
  //   }
  //   else {
  //       $("#edit-product-description-error").text('')
  //   }
  //
  // }

  if(flag == false)
  {
    let xhr = new XMLHttpRequest();

    let formData = new FormData();

    if(image_path_edit != '')
    {
      formData.append('image', image_edit)

    }





    formData.append('name', name_edit);
    formData.append('price', price_edit);
    formData.append('description', description_edit);
    formData.append('category_id', category_id);
    formData.append('product_id', product_id);
    formData.append('_token', _token);

    xhr.open('POST', url_editProduct , true)
    xhr.send(formData)

    xhr.onload = function(response){



      if(xhr.response != '')
      {
        let data = JSON.parse(xhr.response);
        if(data.name_error != '')
        {
          $("#edit-product-name-error").text(data.name_error)
        }
        else {
          $("#edit-product-name-error").text('')
        }

        if(data.price_error != '')
        {
          $("#edit-product-price-error").text(data.price_error)
        }
        else {
          $("#edit-product-price-error").text('')
        }

        if(data.description_error != '')
        {
          $("#edit-product-description-error").text(data.description_error)
        }
        else {
          $("#edit-product-description-error").text('')
        }

        if(data.image_error != '')
        {
          $("#edit-product-image-error").text(data.image_error)
        }


      }




      if(response.currentTarget.status == 204)
      {
        $("#edit-product-error").text('Product successfully updated!').fadeOut(3000);
        setTimeout(function(){

          location.reload()
        }, 3000);
      }

      else if(response.currentTarget.status == 500){
        $("#edit-product-error").text('Error happened! Please try later!').fadeOut(3000);
        setTimeout(function(){

          location.reload()
        }, 3000);
      }






    }


  }







});

});


// edit category

$(document).ready(function(){

  $("#edit-category-btn").on('click', function(){

    let category_name = $("#edit-category-name").val();
    let _token = $("input[name='_token']").val();
    let category_id = $("#edit-category-btn").data('id')

    let flag = false;

    // if(!reCategory.test(category_name))
    // {
    //   $("#edit-category-name-error").text('Name is not correct!')
    //   flag = true;
    // }
    //
    // else {
    //   $("#edit-category-name-error").text('')
    // }

    if(flag == false)
    {
      let xhr = new XMLHttpRequest();
      let formData = new FormData();
      formData.append('category', category_name)
      formData.append('_token', _token)
      formData.append('category_id', category_id)

      xhr.open('post', url_editCategory, true);
      xhr.send(formData);

      xhr.onload = function(response)
      {
        if(xhr.response != '')
        {
          let data = JSON.parse(xhr.response);
          if(data.name_error != '')
          {
            $("#edit-category-name-error").text(data.name_error)
          }
        }

        if(response.currentTarget.status == 204)
        {
            $("#edit-category-error").text('Category successfully updated!').fadeOut(3000);
            setTimeout(function(){

              location.reload()
            }, 3000);

        }

        else if(response.currentTarget.status == 500){
          $("#edit-category-error").text('Error happened! Please try later!').fadeOut(3000);
          setTimeout(function(){

            location.reload()
          }, 3000);
        }



      }



    }


  });


});

$(document).ready(function(){

  $("#btn-contact").on('click', function(){

    let name = $("#full-name-contact").val()
    let email = $("#email-contact").val()
    let message = $("#message-contact").val()
    let _token = $("input[name='_token']").val()




    let flag = false;

    // if(!reName.test(name))
    // {
    //   $("#name-contact-error").text('Name is not correct!')
    //   flag = true;
    //
    // }
    //
    // else {
    //   $("#name-contact-error").text('')
    // }
    // if(!reEmail.test(email))
    // {
    //   $("#email-contact-error").text('E-mail is not correct!')
    //   flag = true;
    //
    //
    // }
    //
    // else {
    //   $("#email-contact-error").text('')
    // }
    //
    // if(!reDescription.test(message))
    // {
    //   $("#message-contact-error").text('Message is not correct!')
    //   flag = true;
    //
    //
    // }
    //
    // else {
    //   if((/[\>\<\*]/).test(message))
    //   {
    //     $("#message-contact-error").text('<>, * are not allowed!')
    //     flag = true;
    //   }
    //   else {
    //       $("#message-contact-error").text('')
    //   }
    //
    // }

    if(flag == false)
    {
      let xhr = new XMLHttpRequest();
      let formData = new FormData();

      xhr.open('post', url_contactForm, true)
      formData.append('name', name)
      formData.append('email', email)
      formData.append('message', message)
      formData.append('_token', _token)
      xhr.send(formData)

      xhr.onload = function(response)
      {
        if(xhr.response != '')
        {

          let data = JSON.parse(xhr.response);

          if(data.mailer)
          {
            $("#name-contact-error").text('');
            $("#email-contact-error").text('');
            $("#message-contact-error").text('');


            $("#send-contact-message-error").text(data.mailer).fadeOut(3000);
            setTimeout(function(){

              window.location.href = '\\home';
            }, 3000);
          }


          if(data.message_error != '')
          {
            $("#message-contact-error").text(data.message_error);
          }
          else {
            $("#message-contact-error").text('');
          }

          if(data.email_error != '')
          {
            $("#email-contact-error").text(data.email_error);
          }
          else {
            $("#email-contact-error").text('');
          }

          if(data.name_error != '')
          {
            $("#name-contact-error").text(data.name_error);
          }
          else {
            $("#name-contact-error").text('');
          }
        }
        else {
          $("#name-contact-error").text('');
          $("#email-contact-error").text('');
          $("#message-contact-error").text('');







        }










      }


    }


  });
})

$(document).on('click', '#btn-checkout', function(){
  let address = $("#address-checkout").val()
  let phone = $("#phone-checkout").val()
  let name = $("#full-name-checkout").val()
  let user_id = $("#full-name-checkout").data('id')



  let flag = false;

  // if(!reName.test(name))
  // {
  //   $("#full-name-checkout-error").text('Name is not correct!')
  //   flag = true;
  //
  // }
  // else {
  //   $("#full-name-checkout-error").text('')
  // }
  //
  // if(!rePhone.test(phone))
  // {
  //   $("#phone-checkout-error").text('Phone is not correct!')
  //   flag = true;
  //
  // }
  // else {
  //   $("#phone-checkout-error").text('')
  // }
  //
  // if(!reAddress.test(address))
  // {
  //   $("#address-checkout-error").text('Address is not correct!')
  //   flag = true;
  //
  // }
  // else {
  //   $("#address-checkout-error").text('')
  // }

  if(flag == false)
  {
    $.ajax({
      url : url_finalCheckout,
      method : 'post',
      dataType : 'json',
      data : {
        address : address,
        user_id : user_id,
        phone : phone,
        name : name,
        _token : $("input[type='hidden']").val()
      },
      success : function(data)
      {
        if(data.inserted)
        {
          $("#checkout-error").text('Thank you! :) We are proccessing your order and will send you and e-mail confirmation shortly.').fadeOut(7000);
          setTimeout(function(){
            window.location.href='\\home';
          }, 7000)

        }

        if(data.error_name != '')
        {
          $("#full-name-checkout-error").text(data.error_name)
        }
        else {
          $("#full-name-checkout-error").text('')
        }

        if(data.error_address != '')
        {
          $("#address-checkout-error").text(data.error_address)
        }
        else {
          $("#address-checkout-error").text('')
        }

        if(data.error_phone != '')
        {
          $("#phone-checkout-error").text(data.error_phone)
        }
        else {
          $("#phone-checkout-error").text('')
        }
      },
      error : function(xhr, status, responseText)
      {
        console.log(status)
      }


    });
  }




})
