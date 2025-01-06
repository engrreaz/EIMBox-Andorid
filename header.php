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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
    <link rel="stylesheet" href="assets/css.css?v=a9">
    <link rel="stylesheet" href="assets/front.css">

    <script src="assets/pre-load.js"></script>
    <?php include 'js.php'; ?>
    <style>
        body {
            background: #fdfbf4;
        }

        .front-icon{
            color:var(--normal);
            position : absolute;
            font-size:50px;
            top:5px;
            right:10px;
        }
        .page-top-box {
            background: var(--dark);
            color: var(--lighter);
            border-radius: 0;
        }

        .page-info-box {
            background: var(--darker);
            color: var(--light);
            border-radius: 0;
        }

        .text-small {
            font-size: small;
            font-weight: 400;
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

        .footer-nav-icon {
            font-size: 20px;
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

        .notice-icon {
            font-size: 1.25em;
            color: seagreen;
            text-align: center;
            margin-right: .75em;
        }

        .notice-text {
            color: black;
        }

        .notice-small-gray {
            color: var(--normal);
            font-size: .75em;
            font-weight: 400;
            padding-top:2px;
        }

        .notice-by {
            font-style: italic;
            font-weight: 600;
        }

        .menu-icon {
            color: var(--lighter);
            font-size: 24px;
            text-align: center;
            font-weight: 700;
        }

        .menu-text {
            font-size: 1.3em;
            text-align: center;
            font-weight: 600;
            font-style: normal;
            line-height: 1.2em;
            color: black;
            padding: 0;
            margin: 0;
            color: var(--lighter);
        }
        .toolbar-icon {
            color: var(--light);
            font-size: 36px;
            line-height:36px;
            text-align: center;
            font-weight: 700;
        }

        .toolbar-text {
            font-size: .70em;
            text-align: center;
            font-weight: 600;
            font-style: normal;
            line-height: 1.7em;
            color: black;
            padding: 0;
            margin: 0;
            color: var(--normal);
        }

        .menu-sub-title {
            color: gray;
            font-size: 11px;
            padding: 0;
            margin: 0;
        }

        .menu-item-block {
            background: var(--lighter);
            color: var(--dark);
            border: 1px solid red;

        }

        .disable {
            color: var(--dark) !important;
            background: var(--dark) !important;
        }

        .menu-item-block h4 {
            font-weight: 500;
            color: var(--dark);
            letter-spacing: 0.75px;
            ;
            margin-top: 5px;
        }

        .menu-item-sub-text {
            margin-top: 8px;
            color: #333;
            line-height: 15px;
            font-size: 12px;
        }

        .menu-separator {
            height: 1px;
            background: var(--dark);
        }

        .menu-item-icon {
            font-size: 30px;
            width: 50px;
            color: var(--dark);
            padding: 0 5px;
            line-height: 24px;
        }

        .tit {
            font-size: 13px;
            font-weight: 600;
        }

        .descrip {
            font-size: 11px;
            font-weight: 400;
            color: var(--darker);
            line-height: 11px;
        }

        .comm {
            font-size: 11px;
            font-weight: 400;
            color: gray;
            font-style: italic;
            line-height: 11px;
        }

        .period-icon {
            margin-left: 5px;
            font-size: 30px;
            color: var(--dark);
        }

        .period-text {
            font-size: .85em;
        }

        .st-pic-normal {
            width: 60px;
            height: 60px;
            padding: 1px;
            border-radius: 50%;
            border: 0px solid var(--light);
        }

        .st-pic-small {
            width: 36px;
            height: 36px;
            padding: 1px;
            border-radius: 50%;
            border: 0px solid var(--light);
        }

        .st-pic-big {
            width: 100px;
            height: 100px;
            padding: 1px;
            border-radius: 50%;
            border: 0px solid var(--light);
        }

        .st-pic-bigger {
            width: 150px;
            height: 150px;
            padding: 1px;
            border-radius: 50%;
            

            
            border: 3px solid var(--normal);
            position: absolute;
            top: 75px;
            z-index: 99;
            margin: auto;
            margin-left: -40px;
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


        table.table-schedule,
        tr.table-schedule,
        td.table-schedule {
            font-size: 14px;
            color: var(--darker);
            border: 0;
        }


        .st-list-photo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin: 1px;
            border: 1px solid var(--darker);
        }


        .stname-eng {
            font-size: 18px;
            font-weight: 700;
            line-height: 18px;
        }

        .stname-ben {
            font-size: 14px;
        }

        .st-id {
            font-size: 11px;
        }

        .roll-no {
            font-size: 13px;
        }


        .card {
            box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
            border-width: 0;
            transition: all .2s;
        }



        .attnd-dot {
            height: 12px;
            width: 12px;
            border-radius: 50%;
            margin-right: 4px;
            background: black:
        }

        .clr-5 {
            background: black:
        }

        .clr-1 {
            background: seagreen;
        }

        .clr-0 {
            background: orange;
        }

        .clr-2 {
            background: red;
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

        .pr-item-eng {
            font-size:18px;
        }
        
    </style>
</head>