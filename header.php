<!doctype html>
<html lang="en">

<head>
    <title> EIMBox </title>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="variant/<?php echo $css; ?>.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
    <link rel="stylesheet" href="assets/css.css?v=a8">
    <link rel="stylesheet" href="assets/front.css">

    <script src="assets/pre-load.js"></script>

    <style>
        body {
            background: #fdfbf4;
        }

        .text-shadow {
            text-shadow: 2px 2px 4px #444;
        }

        .box-shadow {
            box-shadow: 2px 2px 4px #444;
        }

        .page-box {
            border: 0;
            border-radius: 0;

        }


        .page-icon {
            color: white;
            font-size: 24px;
            text-align: center;
        }

        .page-title {
            font-size: 24px;
            text-align: center;
            padding: 15px 0;
            font-weight: 500;
            line-height: 15px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 700;
            margin: 0;
            padding: 0;
            line-height: .5rem;
        }

        .notice-icon{
            font-size:1.0em;
            color:white;
            background:seagreen;
            width:1.75em;
            height:1.75em;
            border-radius:50%;
            padding:0px;
            text-align:center;
            margin-right:1em;
        }

        .notice-text {
            color:black;
        }

        .notice-small-gray {
            color: gray;;
            font-size:.75em;
        }
        .notice-by {
            font-style:italic;

        }

        .menu-icon {
            color: var(--darker);
            font-size: 24px;
            font-weight: 700;
        }

        .menu-text {
            font-size: 1.3em;
            font-weight: 500;
            font-style: normal;
            line-height: 1.2em;
            color: black;
            padding: 0;
            margin: 0;
        }

        .menu-sub-title {
            color: gray;
            font-size: 11px;
            padding: 0;
            margin: 0;
        }

        .pic {
            width: 90px;
            height: 90px;
            padding: 1px;
            border-radius: 50%;
            border: 0px solid var(--light);
        }

        .a {
            font-size: 1.5rem;
            font-weight: 700;
            font-style: normal;
            line-height: 18px;
            color: var(--dark);
        }

        .b {
            font-size: 20px;
            font-weight: 500;
            font-style: normal;
            line-height: 22px;
            margin-top: 5px;
        }

        .c {
            font-size: 11px;
            font-weight: 500;
            font-style: italic;
            line-height: 12px;
            padding: 3px;
        }

        .d {
            font-size: 15px;
            font-weight: 700;
            font-style: normal;
            line-height: 18px;
            color: var(--light);
        }


        .e {
            font-size: 11px;
            font-weight: 500;
            font-style: italic;
            line-height: 11px;
            color: gray;
        }

        .ico {
            font-size: 24px;
            color: var(--dark);
        }








        .card {
            box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
            border-width: 0;
            transition: all .2s;
        }




        .wd {
            text-align: center;
            font-size: 30px;
            color: var(--lighter);
            margin: 0;
            padding: 0;
            border: 0px solid black;
        }

        .wdl {
            text-align: center;
            font-size: 30px;
            color: var(--dark);
            margin: 0;
            padding: 0;
            border: 0px solid black;
        }

        .lbls {
            text-align: center;
            font-size: 8px;
            color: var(--dark);
        }
    </style>
</head>