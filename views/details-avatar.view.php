<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Avatar</title>
    <link rel="stylesheet" href="../css/details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link type="text/css" rel="stylesheet" href="../css/lightgallery.css" />
</head>
<body>
    <div class="header">
        <h3>Header</h3>
    </div>
    <div class="slider-container">
        <div class="slider slider-header">
            <img src="../details-img/avatar1.jpeg" class="slider__img">
            <img src="../details-img/avatar2.jpeg" class="slider__img">
            <img src="../details-img/avatar3.jpeg" class="slider__img">
            <img src="../details-img/avatar4.jpeg" class="slider__img">
            <img src="../details-img/avatar5.jpeg" class="slider__img">
        </div>
        <div class="slider-controls controls-header slider-buttons">
            <div class="slider__back"><img src=".././icons/arrow-left.svg" class="slider-buttons"></div>
            <div class="slider__next"><img src=".././icons/arrow-right.svg" class="slider-buttons"></div>
        </div>
    </div>

    <div class="information">
        <div class="information__details">
            <h1>AVATAR</h1>
            <h3>THE WAY OF WATER</h3>
            <div class="details__assessment">
                <span class="assessment--stars">★★★★☆</span>
                <span>4/5<span>
            </div>
            <span>Dirigida per James Cameron</span> <br> <br>
            <span class="details--description">Sam Worthington i Zoe Saldaña reprenen els seus papers icònics, interpretant Jake Sully i Neytiri, que han esdevingut uns meravellosos pares que fan tot el possible per mantenir unida la seva família. Quan esdeveniments imprevistos els allunyen de casa seva, els Sully viatgen a través dels immensos confins de la lluna Pandora i fugen al territori que està en poder del clan Metkayina, un poble que viuen en harmonia amb els oceans que l'envolten. Allà, els Sully hauran d'aprendre a navegar pel món perillós de l'aigua i també a guanyar-se l'acceptació de la seva nova comunitat.</span>
        </div>
        <div class="details__cover">
            <img src="../details-img/posterAvatar.jpg">
        </div>
    </div>

    <div id="lightgallery">
        <a href="../details-img/avatar5.jpeg" data-lg-size="1024-800">
            <img alt="img1" src="../details-img/avatar5.jpeg" />
        </a>
        <a href="../details-img/avatar2.jpeg" data-lg-size="1024-800">
            <img alt="img2" src="../details-img/avatar2.jpeg" />
        </a>
        <a href="../details-img/avatar3.jpeg" data-lg-size="1024-800">
            <img alt="img2" src="../details-img/avatar3.jpeg" />
        </a>
    </div>

    <div class="slider-container continer-footer">
        <div class="slider slider-footer">
            <img src="../details-img/avatar1.jpeg" class="slider__img slider__img-footer">
            <img src="../details-img/avatar2.jpeg" class="slider__img slider__img-footer">
            <img src="../details-img/avatar3.jpeg" class="slider__img slider__img-footer">
            <img src="../details-img/avatar4.jpeg" class="slider__img slider__img-footer">
            <img src="../details-img/avatar5.jpeg" class="slider__img slider__img-footer">
        </div>
        <div class="slider-controls controls-footer slider-buttons">
            <div class="slider__back"><img src=".././icons/arrow-left.svg" class="slider-buttons"></div>
            <div class="slider__next"><img src=".././icons/arrow-right.svg" class="slider-buttons"></div>
        </div>
    </div>

    <div class="footer">
        <h3>Footer</h3>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js">
</script>
<script src="../JavaScript/details.js"></script>
<script src="../JavaScript/footer.js"></script>


<script src="../JavaScript/lightgallery.min.js"></script>
<script type="text/javascript">
    lightGallery(document.getElementById('lightgallery'), {
    });
</script>
</html>