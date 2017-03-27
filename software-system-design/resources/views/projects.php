<html>
    <head>
    <title>My Web App</title>
    </head>
    <body>
        <div>
        <?php foreach ($projects as $project) {
                 echo "<div>$project->name";
                 echo "<button> Delete </button> </div>";
            
            }?>
        </div>
    </body>
</html>