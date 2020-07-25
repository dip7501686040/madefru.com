<?php
    include('header.php');
?>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat');

        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }
        body {
        font-family: 'Montserrat', sans-serif;
        background-color: #262626;
        color: #5fb709;
        }
        h1 {
        text-align: center;
        margin: 2rem 0;
        font-size: 2.5rem;
        }

        .accordion {
        position: relative;
        top: 100px;    
        width: 90%;
        max-width: 1000px;
        margin: 2rem auto;
        }
        .accordion-item {
        background-color: #fff;
        color: #111;
        margin: 1rem 0;
        border-radius: 0.5rem;
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.25);
        }
        .accordion-item-header {
        padding: 0.5rem 3rem 0.5rem 1rem;
        min-height: 3.5rem;
        line-height: 1.25rem;
        font-weight: bold;
        display: flex;
        align-items: center;
        position: relative;
        cursor: pointer;
        }
        .accordion-item-header::after {
        content: "\002B";
        font-size: 2rem;
        position: absolute;
        right: 1rem;
        }
        .accordion-item-header.active::after {
        content: "\2212";
        }
        .accordion-item-body {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
        }
        .accordion-item-body-content {
        padding: 1rem;
        line-height: 1.5rem;
        border-top: 1px solid;
        border-image: linear-gradient(to right, transparent, #34495e, transparent) 1;
        }

        @media(max-width:767px) {
        html {
            font-size: 14px;
        }
        }
    </style>
</head>
<body>
    <div class="accordion">
    <h1>FAQ</h1>
    <div class="accordion-item">
        <div class="accordion-item-header">
        What is Handmade?
        </div>
        <div class="accordion-item-body">
        <div class="accordion-item-body-content">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores ipsum, iste labore nihil reprehenderit iusto molestias laudantium sit error, vero perferendis magnam velit quasi sunt eveniet cupiditate consequatur officia neque!
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <div class="accordion-item-header">
            What is Handmade?
        </div>
        <div class="accordion-item-body">
        <div class="accordion-item-body-content">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem fugiat veritatis provident praesentium excepturi quos architecto consequatur eos perspiciatis? Quisquam atque voluptates accusantium maxime magni, facilis provident deserunt iusto temporibus!
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <div class="accordion-item-header">
        What are some basic skills of artist?
        </div>
        <div class="accordion-item-body">
        <div class="accordion-item-body-content">
            <ul style="padding-left: 1rem;">
            <li>Lorem ipsum dolor sit amet consectetur.</li>
            <li>Lorem ipsum dolor sit amet consectetur.</li>
            <li>Lorem ipsum dolor sit amet consectetur.</li>
            <li>Lorem ipsum dolor sit amet consectetur.</li>
            <li>Lorem ipsum dolor sit amet consectetur.</li>
            <li>Lorem ipsum dolor sit amet consectetur.</li>
            <li>Lorem ipsum dolor sit amet consectetur.</li>
            <li>Lorem ipsum dolor sit amet consectetur.</li>
            <!-- <li>CSS Preprocessing</li> -->
            <li>Lorem ipsum dolor sit amet consectetur.</li>
            <li>Lorem ipsum dolor sit amet consectetur.</li>
            </ul>
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <div class="accordion-item-header">
            What is Handmade?
        </div>
        <div class="accordion-item-body">
        <div class="accordion-item-body-content">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae perferendis ut quibusdam facilis voluptatum eaque temporibus ipsum ea accusantium iusto similique, asperiores, aliquam voluptates blanditiis eligendi quas porro! Aspernatur, maxime.
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <div class="accordion-item-header">
            What is Handmade?
        </div>
        <div class="accordion-item-body">
        <div class="accordion-item-body-content">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates ad esse, facere magnam itaque minus earum eligendi, assumenda sunt asperiores dolorum molestias eos voluptate possimus quisquam voluptatum velit ipsum amet?
        </div>
        </div>
    </div>
    </div>
    <script >

        const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

        accordionItemHeaders.forEach(accordionItemHeader => {
        accordionItemHeader.addEventListener("click", event => {

            accordionItemHeader.classList.toggle("active");
            const accordionItemBody = accordionItemHeader.nextElementSibling;
            if(accordionItemHeader.classList.contains("active")) {
            accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
            }
            else {
            accordionItemBody.style.maxHeight = 0;
            }
            
        });
        });
    </script>

<div style="position: relative; top:100px; height:560px">
<?php
    include('footer.php');
?>
</div>