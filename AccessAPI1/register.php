<head>
  <style>
    /* all */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    :root {
      --main-blue: #71b7e6;
      --main-purple: #9b59b6;
      --main-grey: #ccc;
      --sub-grey: #d9d9d9;
    }

    body {
      display: flex;
      height: 100vh;
      justify-content: center;
      /*center vertically */
      align-items: center;
      /* center horizontally */
      background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
      padding: 10px;
    }

    /* container and form */
    .container {
      max-width: 700px;
      width: 100%;
      background: #fff;
      padding: 25px 30px;
      border-radius: 5px;
    }

    .container .title {
      font-size: 25px;
      font-weight: 500;
      position: relative;
      text-align: center;
    }

    .container .title::before {
      content: "";
      position: absolute;
      height: 3.5px;
      width: 30px;
      background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
      left: 245;
      bottom: 0;
    }

    .container form .user__details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin: 20px 0 12px 0;
    }

    /* inside the form user details */
    form .user__details .input__box {
      width: calc(100% / 2 - 20px);
      margin-bottom: 15px;
    }

    .user__details .input__box .details {
      font-weight: 500;
      margin-bottom: 5px;
      display: block;
    }

    .user__details .input__box input {
      height: 45px;
      width: 100%;
      outline: none;
      border-radius: 5px;
      border: 1px solid var(--main-grey);
      padding-left: 15px;
      font-size: 16px;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
    }

    .user__details .input__box input:focus,
    .user__details .input__box input:valid {
      border-color: var(--main-purple);
    }

    /* inside the form gender details */

    form .gender__details .gender__title {
      font-size: 20px;
      font-weight: 500;
    }

    form .gender__details .category {
      display: flex;
      width: 80%;
      margin: 15px 0;
      /* justify-content: space-between; */
    }

    .gender__details .category label {
      display: flex;
      align-items: center;
    }

    .gender__details .category .dot {
      height: 18px;
      width: 18px;
      background: var(--sub-grey);
      border-radius: 50%;
      margin: 10px;
      border: 5px solid transparent;
      transition: all 0.3s ease;
    }

    #dot-1:checked~.category .one,
    #dot-2:checked~.category .two {
      border-color: var(--sub-grey);
      background: var(--main-purple);
    }

    form input[type="radio"] {
      display: none;
    }

    /* submit button */
    form .button {
      height: 45px;
      margin: 45px 0;
    }

    form .button input {
      height: 100%;
      width: 100%;
      outline: none;
      color: #fff;
      border: none;
      font-size: 18px;
      font-weight: 500;
      border-radius: 5px;
      background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
      transition: all 0.3s ease;
    }

    form .button input:hover {
      background: linear-gradient(-135deg, var(--main-blue), var(--main-purple));
    }

    @media only screen and (max-width: 584px) {
      .container {
        max-width: 100%;
      }

      form .user__details .input__box {
        margin-bottom: 15px;
        width: 100%;
      }

      form .gender__details .category {
        width: 100%;
      }

      .container form .user__details {
        max-height: 300px;
        overflow-y: scroll;
      }

      .user__details::-webkit-scrollbar {
        width: 0;
      }
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>

<div class="container">
  <a href="home">Home</a>
  <div class="title">Registration</div>
  <form action="#" onsubmit='return formData(this)' id="formdata" method="post" enctype="multipart/form-data">
    <div class="user__details">
      <div class="input__box">
        <span class="details">Full Name</span>
        <input type="text" placeholder="Enter FullName" name="fullname" id="fullname" required>
      </div>
      <div class="input__box">
        <span class="details">Username</span>
        <input type="text" placeholder="Enter Username" name="username" id="username" required>
      </div>
      <div class="input__box">
        <span class="details">Email</span>
        <input type="email" placeholder="Enter Email Id" name="email" id="email" required>
      </div>
      <div class="input__box">
        <span class="details">Phone Number</span>
        <input type="tel" minlength="10" maxlength="10" placeholder="Enter Phonenumber" name="phone" id="phone" required>
      </div>
      <div class="input__box">
        <span class="details">Password</span>
        <input type="password" minlength="3" maxlength="8" placeholder="********" name="password" id="password" required>
      </div>
      <div class="input__box">
        <span class="details">Confirm Password</span>
        <input type="password" placeholder="********" name="cpassword" id="cpassword" required>
      </div>
      <div class="input__box">
        <span class="details">Profile_pic</span>
        <!-- <input type="file" name="profile_pic" id="profile_pic"> -->
        <input type="file" id="profile_pic" onchange="uploadImage(event)" accept="image/*">
        <img width="100px" id="output" />
        <input type="hidden" name="profile_pic" id="profile_pic" value=""/>
        <script>
          var uploadImage = function(event) {
            // console.log(event.target.files[0]);
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            let photo = event.target.files[0];
            let formdata = new FormData();
            formData.append('profile_pic', photo);
            fetch("http://localhost/php/php/API1/uploadimage", {
              method: 'POST',
              body: formData
            }).then((res)=> res.json()).then((data)=> {
              console.log(data);
              document.getElementById("profile_pic").values = data
            })
          };
        </script>

      </div>
      <div class="gender__details">
        <span class="category">Hobby</span>
        <input type="checkbox" name="hobby[]" id="cricket" value="cricket"><label for="cricket">Cricket</label>
        <input type="checkbox" name="hobby[]" id="music" value="music"><label for="music">Music</label>
        <input type="checkbox" name="hobby[]" id="reading" value="reading"><label for="reading">Reading</label>
        <input type="checkbox" name="hobby[]" id="carrom" value="carrom"><label for="carrom">Carrom</label>
      </div>

    </div>
    <div class="gender__details">
      <input type="radio" name="gender" id="dot-1" value="Male">
      <input type="radio" name="gender" id="dot-2" value="Female">

      <span class="gender__title">Gender</span>
      <div class="category">
        <label for="dot-1">
          <span class="dot one"></span>
          <span>Male</span>
        </label>
        <label for="dot-2">
          <span class="dot two"></span>
          <span>Female</span>
        </label>

      </div>
    </div>

    <div class="input__box">
      <label for="country">Country</label>
      <select name="country" id="country" onchange="statesbycountryID(this)">
        <option value="">select Country</option>
      </select>
    </div>
    <div class="input__box">
      <label for="states">State</label>
      <select name="states" id="states" onchange="citybystatesid(this)">
        <option value="">select States</option>
      </select>
    </div>
    <div class="input__box">
      <label for="cities">city</label>
      <select name="city" id="city">
        <option value="">select city</option>
      </select>
    </div>


    <div class="button">
      <input type="submit" id="register" name="register" value="Register">
    </div>
  </form>
</div>
<script>
  function allcountries() {
    fetch("http://localhost/php/php/API1/allcountry").then((res) => res.json()).then((responce) => {
      console.log(responce);
      htmloption = `<option value="">select Country</option>`
      responce.data.forEach(data => {
        console.log(data);
        htmloption += `<option value=${data.country_id} >${data.country_name}</option>`
      });
      console.log(htmloption);
      document.getElementById("country").innerHTML = htmloption;
    });
  }
  allcountries()

  function statesbycountryID(id) {
    // console.log(id.value);
    fetch("http://localhost/php/php/API1/allstates?countryid=" + id.value).then((res) => res.json()).then((responce) => {
      console.log(responce);
      htmloption = `<option value="">select States</option>`
      responce.data.forEach(data => {
        console.log(data);
        htmloption += `<option value="${data.sid}">${data.name}</option>`

      });
      console.log(htmloption);
      document.getElementById("states").innerHTML = htmloption;
    })

  }

  function citybystatesid(id) {
    console.log(id.value);
    fetch("http://localhost/php/php/API1/allcities?stateid=" + id.value).then((res) => res.json()).then((responce) => {
      console.log(responce);
      htmloption = `<option value="">select city</option>`
      responce.data.forEach(data => {
        console.log(data);
        htmloption += `<option value="${data.cid}">${data.name}</option>`
      });
      console.log(htmloption);
      document.getElementById("city").innerHTML = htmloption;
    });
  }

  function formData() {
    event.preventDefault();
    //Serialize the Form
    var values = {};
    $.each($("#formdata").serializeArray(), function(i, field) {
      values[field.name] = field.value;

    });
    HobbyString = ""
    $('input[type=checkbox]:checked').map(function() {
      // console.log(this.value);
      HobbyString += this.value + ",";
    });
    Hobbystr = HobbyString.substring(0, HobbyString.length - 1);
    values['hobby'] = Hobbystr;
    delete values['hobby[]'];
    delete values['country'];
    delete values['states'];
    delete values['cpassword'];
    fetch("http://localhost/php/php/API1/register", {
      method: 'POST',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(values)
    }).then((res) => res.json()).then((responce) => {
      console.log(responce);
    })

    // console.log(Hobbystr);
    console.log(values);

  }
</script>