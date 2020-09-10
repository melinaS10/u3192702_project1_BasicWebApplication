<?php include "templates/header.php"; ?>

<a href="welcome.php" class="goback">Back</a>

<div class="ratwrap">

<h1 class="rahd">Basic Web Design: Rationale</h1>

<h2 class="rationhead">Introduction</h2> 

 <p class="rationp">
    The theme of project 1 is a recipe application called “Bon Apetit”, which is French for “good appetite”. Initially, I followed through the tutorials on Canvas. These tutorials provided an understanding of what the application does, how it operates and what the basic web application should entail. This was followed by preliminary research into how to structure the application, how to enhance its functionality/interaction and research into existing applications. Some recipe applications that were viewed were <a href="https://www.bigoven.com">Big Oven</a>,<a href="https://tasty.co">Tasty</a> and the <a href="https://www.yummly.com">Yummly</a> application. Although more advanced than the Bon Apetit application, these applications outlined areas/sections to focus on and provided an understanding of how recipe/food applications are structured. 
</p> 

<h2 class="rationhead">The code</h2>

<p class="rationp">
    On the 'create' page, each input box is styled the same to keep consistency throughout the input boxes. On each page of the application (apart from 'login' and 'register'), a back button was added for users to navigate back to the homepage easily. The code is simple yet functional. I intended to keep it basic as I am still learning. I had more ideas for the application, however, these either were not neccessary to the task of the assignment or were more troublesome then helpful. These are described in more detail in the next section.
</p>

<h2 class="rationhead">Complications</h2>

<p class="rationp">
     During the conceptual stages of the application, numerous sections that were added, changed or scrapped. Originally on the “add a recipe” webpage, there was an option to upload an image and append it to the form. It was executed using a BLOB (Binary large data object)in the recipes table. However, this concept was cancelled, due to complications. Attempts often resulted in the code breaking or only printing the error message. Another complication was trying to get the 'create' page to show errors. When a blank form is submitted, the page prints an error message. Whereas, a completed form will notify the user of the success. After a few attempts, I eventually figured out how to make this work. 
</p>

<h2 class="rationhead">Conclusion/thoughts</h2>

<p class="rationp">
    Overall, I believe the application does what it was intended, although not successfully. However, as I am not familiar with php and ran out of time, the application helped broaden my knowledge. I learnt so much from deciphering the language of php, that I believe taht in itself is an accomplishment. If I could have gotten the image upload to work and made the application more interactive (e.g. notifications, subtle animations) it would have enhanced the overall user experience and interest of the application.  
</p>
</div>

<?php include "templates/footer.php"; ?>