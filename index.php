<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Malolo Inn Online Reservation System</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Basic styling for the slideshow */
        .slideshow-container {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            max-width: 100%;
            margin: auto;
            overflow: hidden;
            height: 400px; /* Fixed height for the container */
        }

        .slide {
            display: none;
            width: 100%;
            height: 100%; /* Match the height of the container */
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Maintain aspect ratio, cover the container */
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 3px;
            user-select: none;
        }

        .next {
            right: 0;
        }

        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>
<body>

<header>
    <h1>Welcome to Malolo Inn</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="reservation.php">Make a Reservation</a>
    <a href="dashboard.php">Customer Dashboard</a>
    <a href="admin.php">Admin Dashboard</a>
</nav>

<div class="container">
    <h2>About Malolo Inn</h2>
    <p>Welcome to our Malolo Inn! We offer comfortable rooms at affordable prices. Feel free to browse our site and make a reservation.</p>
    <p>Enjoy your stay with us!</p>
	<p>Jiwaka Free Country! Come enjoy your life free with free gifts!!</p>
	<p>W@l Wei!!</p>
	<p>W@ghi T@it!!</p>
    
    <!-- Slideshow container -->
    <div class="slideshow-container">
        <!-- Slides -->
        <div class="slide">
            <img src="images/home/image1.jpg" alt="Malolo Inn Image 1">
        </div>
        <div class="slide">
            <img src="images/home/image2.jpg" alt="Malolo Inn Image 2">
        </div>
        <div class="slide">
            <img src="images/home/image3.jpg" alt="Malolo Inn Image 3">
        </div>
        <div class="slide">
            <img src="images/home/image4.jpg" alt="Malolo Inn Image 4">
        </div>
        <div class="slide">
            <img src="images/home/image5.jpg" alt="Malolo Inn Image 5">
        </div>
        <div class="slide">
            <img src="images/home/image6.jpg" alt="Malolo Inn Image 6">
        </div>
        <div class="slide">
            <img src="images/home/image7.jpg" alt="Malolo Inn Image 7">
        </div>
        
        <!-- Next/Prev controls -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
</div>

<script>
    let slideIndex = 0;

    function showSlides() {
        let slides = document.getElementsByClassName("slide");
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 10000); // Change image every 10 seconds
    }

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Initial call to showSlides function
    showSlides();
</script>

</body>
</html>
