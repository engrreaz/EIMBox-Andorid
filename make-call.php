<script>
    // 
    // history.back();

    $(window).focus(function () {
        console.log('welcome (back)');
        const myTimeout = setTimeout(history.back(), 3000);
    });

</script>