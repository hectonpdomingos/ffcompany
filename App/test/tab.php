<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Keep Last Selected Bootstrap Tab Active on Page Refresh</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#subtabs a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>
    <style type="text/css">
        .bs-example {
            margin: 20px;
        }
    </style>
</head>

<body>
    <div class="bs-example">
        <ul id="subtabs" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#artists" aria-controls="artists" role="tab" data-toggle="tab">Artists</a></li>
            <li role="presentation"><a href="#subjects" aria-controls="subjects" role="tab" data-toggle="tab">Subjects</a></li>
            <li role="presentation"><a href="#pichafruit" aria-controls="pichafruit" role="tab" data-toggle="tab">pichafruit</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="artists">
                <ul>Tab 1
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane" id="subjects">
                <ul>
                        <!DOCTYPE html>
                        <html lang="en">
                        <head>
                        <meta charset="UTF-8">
                        <title>Keep Last Selected Bootstrap Tab Active on Page Refresh</title>
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                        <script type="text/javascript">
                        $(document).ready(function(){
                            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                                localStorage.setItem('activeTab', $(e.target).attr('href'));
                            });
                            var activeTab = localStorage.getItem('activeTab');
                            if(activeTab){
                                $('#subtabs a[href="' + activeTab + '"]').tab('show');
                            }
                        });
                        </script>
                        <style type="text/css">
                            .bs-example{
                                margin: 20px;
                            }
                        </style>
                        </head>
                        <body>
                        <div class="bs-example">
                           <ul id="subtabs" class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#artists" aria-controls="artists" role="tab" data-toggle="tab">Artists</a></li>
                                <li role="presentation"><a href="#subjects" aria-controls="subjects" role="tab" data-toggle="tab">Subjects</a></li>
                               
                                <li role="presentation"><a href="#pichafruit" aria-controls="pichafruit" role="tab" data-toggle="tab">pichafruit</a></li>
                            </ul>
                        
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="artists">
                                    <ul>Tab 1
                                    </ul>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="subjects">
                                    <ul>
                                   
                                    </ul>
                                </div>
                                
                                <div role="tabpanel" class="tab-pane" id="pichafruit">
                                    <ul>
                                    "JKBAJHBCKAJcjkbac akjcbsdjvnsfjv jnksjfnvjsfnvsvkjsnvkjasnvk svjkbsdbvjasdvk"
                                    </ul>
                                </div>        
                            </div>
                        </div>
                        </body>
                        </html>                                		
                </ul>
            </div>

            <div role="tabpanel" class="tab-pane" id="pichafruit">
                <ul>
                    <?php
            echo "tab 3";
            ?>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>