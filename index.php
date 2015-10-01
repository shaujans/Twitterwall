<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <style type="text/css">
        body {
            background: #f8f8f8;
            font-family: "Helvetica", Arial, sans-serif;
            font-size: 14px;
            line-height: 22px;
        }

        * {
            box-sizing: border-box;
        }

        .container {
            width: 400px;
            background: #fff;
            margin: 100px auto;
            overflow: hidden;
            border-radius: 3px;
            box-shadow: 0px 0px 3px 0px rgba(50, 50, 50, 0.4);
        }

        h1 {
            background: #3195bd;
            color: #fff;
            font-size: 16px;
            text-align: center;
            padding: 20px 10px;
            margin: 0;
            
        }

        ul {
            padding: 0 20px;
            overflow-y: scroll
        }

        li {
            list-style: none;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        li:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container" id="tweets">
        <h1>Tweets van <span id="username"></span></h1>
        <ul></ul>
    </div>
    
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        var twitter = {
            tweets : {},
            list_container : $("#tweets ul"),
            user_container : $("#tweets #username"),

            getTweets : function() {
                jQuery.ajax({
                    url: "tweets.php",
                    type:"GET",
                    dataType: "json",
                    success: function(data) {
                        twitter.tweets = data;
                        twitter.showTweets();
                    },
                    error : function(xhr, textStatus, errorThrown ) {
                        alert("Error: fout bij ophalen van tweets. Code: " + xhr.status);
                    }
                });
            },

            showTweets : function() {
                twitter.user_container.html(twitter.tweets[0].user.name);

                $.each(twitter.tweets, function(i, tweet) {
                    twitter.list_container.append("<li>" + tweet.text +"</li>");
                });
            }
        }

        twitter.getTweets();
    });
    </script>
</body>
</html>