<!-- footer -->
<div class="w3-row w3-center w3-padding-top" style="background-color:rgba(51,63,80,1);">
  <div class="w3-quarter w3-section w3-text-white">
    <h3>Our Services</h3>
    <p><a href="../." style="text-decoration:none" class="w3-hover-opacity">Windows</a></p>
    <p><a href="../." style="text-decoration:none" class="w3-hover-opacity">MacOS</a></p>
    <p><a href="../." style="text-decoration:none" class="w3-hover-opacity">Linux</a></p>
  </div>
  <div class="w3-quarter w3-section w3-text-white">
  <h4>Company</h4>
  <p><a href="../about" style="text-decoration:none" class="w3-hover-opacity">About</a></p>
    <p><a href="#" style="text-decoration:none" class="w3-hover-opacity">Terms & Conditions</a></p>
    <p><a href="#" style="text-decoration:none" class="w3-hover-opacity">Privacy Policy</a></p>
  </div>
  <div class="w3-quarter w3-section w3-text-white">
  <h4>Resources</h4>
  <p><a href="index" style="text-decoration:none" class="w3-hover-opacity">Blogs</a></p>
    <p><a href="index" style="text-decoration:none" class="w3-hover-opacity">Blogs Catagory</a></p>
    <p><a href="blogs_create" style="text-decoration:none" class="w3-hover-opacity">Publish you own</a></p>
  </div>
  <div class="w3-quarter w3-section w3-text-white">
  <h4>Contact Us</h4>
  <p><a href="../." style="text-decoration:none" class="w3-hover-opacity">softos.in</a></p>
    <p><a href="index" style="text-decoration:none" class="w3-hover-opacity">blogs.softos.in</a></p>
    <p><a href="#" style="text-decoration:none" class="w3-hover-opacity">team@softos.in</a></p>
  </div>
</div>
<footer class="w3-center w3-padding-16" style="background-color:rgba(51,63,80,1);">
  <div class="w3-xlarge w3-section w3-text-white">
    <a href="#"><i class="fa fa-facebook-official w3-hover-opacity w3-text-red"></i></a>
    <a href="https://www.instagram.com/softos.in/?hl=en"><i class="fa fa-instagram w3-hover-opacity w3-text-yellow"></i></a>
    <a href="#"><i class="fa fa-snapchat w3-hover-opacity w3-text-green"></i></a>
    <a href="#"><i class="fa fa-pinterest-p w3-hover-opacity w3-text-blue"></i></a>
    <a href="#"><i class="fa fa-twitter w3-hover-opacity w3-text-indigo"></i></a>
    <a href="#"><i class="fa fa-linkedin w3-hover-opacity w3-text-purple"></i></a>
  </div>
  
  <p class="w3-text-white">Powered by SoftOS Inc. | © SoftOS 2020</a></p>
</footer>
 

<script>

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();


function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}


function profile_portal() {
  var x = document.getElementById("profile_portal");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

function search_portal() {
  document.getElementById("search_portal").style.display="block";
  document.getElementById("search").focus();
}

function user_portal() {
  var x = document.getElementById("user_portal");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

function feedback_portal() {
  var x = document.getElementById("feedback_portal");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

</script>

</body>
</html>