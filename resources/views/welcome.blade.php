<?php
$studentview = false;
?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

	<link type="text/css" rel="stylesheet" href="{{ asset('css/app.min.css')}}">
    </head>
    <body>
    <div class="box-container">
        <header>
            <div class="item mobile">
                <div class="burger-layer"></div>
                <div class="burger-layer"></div>
                <div class="burger-layer"></div>
            </div>
            <div class="item mobile">
            <h2>Proposals</h2>
            </div>
            <div class="item screen">
                <ul>
                    <li><a href="">Home</a></li>
                    <?php
                    if ($studentview == True) {
                        echo '<li><a href="">My Proposal</a></li>';
                        echo '<li><a href="">Proposal Versions</a></li>';
                    } else {
                        echo '<li><a href="">Proposals</a></li>';
                      }
                      ?>
                </ul>
            </div>
        </header>
    </div>
    <div class="box-container">
        <article>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi quis hendrerit dolor magna eget est lorem ipsum. Morbi tristique senectus et netus et malesuada. Est placerat in egestas erat. In hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Velit dignissim sodales ut eu sem integer vitae justo. Sit amet nisl purus in mollis. Eu lobortis elementum nibh tellus. Etiam erat velit scelerisque in dictum non consectetur a. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. A iaculis at erat pellentesque adipiscing commodo elit. Duis ultricies lacus sed turpis tincidunt. Sit amet facilisis magna etiam tempor orci eu lobortis elementum. Tincidunt augue interdum velit euismod in pellentesque. Pretium viverra suspendisse potenti nullam ac. Diam maecenas sed enim ut sem viverra aliquet eget. Fringilla urna porttitor rhoncus dolor purus non enim praesent. Quam adipiscing vitae proin sagittis nisl. Est ante in nibh mauris cursus mattis molestie a. Tristique senectus et netus et malesuada fames ac turpis egestas.

                Consequat mauris nunc congue nisi vitae. Quam pellentesque nec nam aliquam sem et tortor. Est ante in nibh mauris cursus. Ut tristique et egestas quis ipsum suspendisse. Habitant morbi tristique senectus et netus. Ornare suspendisse sed nisi lacus sed viverra tellus in. Morbi blandit cursus risus at ultrices mi tempus. Sed nisi lacus sed viverra tellus. Sit amet consectetur adipiscing elit ut. Amet massa vitae tortor condimentum lacinia. Vitae sapien pellentesque habitant morbi tristique senectus et. Nunc sed velit dignissim sodales ut eu. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Netus et malesuada fames ac turpis egestas. Adipiscing commodo elit at imperdiet dui accumsan sit.

                Pharetra pharetra massa massa ultricies mi quis. Ac tortor vitae purus faucibus ornare suspendisse. Sed euismod nisi porta lorem mollis aliquam. Urna nec tincidunt praesent semper feugiat. Purus faucibus ornare suspendisse sed nisi lacus sed viverra. Tempus imperdiet nulla malesuada pellentesque elit eget gravida. Amet porttitor eget dolor morbi non arcu risus quis varius. At augue eget arcu dictum varius duis at. Tortor aliquam nulla facilisi cras fermentum odio. Convallis a cras semper auctor neque vitae tempus quam pellentesque. Sagittis nisl rhoncus mattis rhoncus. Volutpat maecenas volutpat blandit aliquam etiam erat velit. Ante metus dictum at tempor commodo ullamcorper. Pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Morbi tristique senectus et netus et malesuada fames. Odio tempor orci dapibus ultrices in iaculis. Non arcu risus quis varius quam. Erat nam at lectus urna duis convallis convallis.

                Euismod quis viverra nibh cras pulvinar mattis nunc sed blandit. Nec ultrices dui sapien eget mi proin sed libero. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium. Curabitur gravida arcu ac tortor. Diam maecenas sed enim ut sem viverra aliquet eget. Viverra justo nec ultrices dui. Pellentesque eu tincidunt tortor aliquam nulla facilisi cras fermentum odio. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Feugiat nibh sed pulvinar proin gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus. Felis eget velit aliquet sagittis id consectetur purus. Fames ac turpis egestas maecenas pharetra. Faucibus purus in massa tempor nec feugiat nisl pretium. Non arcu risus quis varius. Purus in mollis nunc sed id.

                Etiam erat velit scelerisque in dictum non consectetur. Molestie a iaculis at erat pellentesque adipiscing commodo elit at. Neque convallis a cras semper auctor. Feugiat in fermentum posuere urna nec tincidunt praesent. Tempus urna et pharetra pharetra. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Id aliquet lectus proin nibh. Feugiat sed lectus vestibulum mattis. Pretium quam vulputate dignissim suspendisse in est ante. Sed vulputate mi sit amet mauris commodo. At lectus urna duis convallis. Semper risus in hendrerit gravida rutrum quisque. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Justo donec enim diam vulputate ut pharetra sit amet aliquam. Tincidunt id aliquet risus feugiat in ante metus. Aliquet enim tortor at auctor urna. Eu sem integer vitae justo eget magna. Malesuada fames ac turpis egestas sed tempus.

                Velit dignissim sodales ut eu sem. Mauris pharetra et ultrices neque ornare. Maecenas volutpat blandit aliquam etiam erat velit scelerisque in dictum. Orci dapibus ultrices in iaculis nunc. Nisl condimentum id venenatis a. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Turpis in eu mi bibendum neque egestas congue quisque. Eget magna fermentum iaculis eu non. Enim nunc faucibus a pellentesque sit amet porttitor eget. Scelerisque eu ultrices vitae auctor eu augue ut lectus arcu. Aliquet eget sit amet tellus cras adipiscing enim eu turpis. Nullam non nisi est sit amet. Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh. Lectus sit amet est placerat. Adipiscing commodo elit at imperdiet dui accumsan sit. Accumsan sit amet nulla facilisi. Amet tellus cras adipiscing enim eu. Enim nec dui nunc mattis enim ut tellus elementum. Curabitur vitae nunc sed velit dignissim. Mauris in aliquam sem fringilla ut morbi tincidunt.

                Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Ornare arcu dui vivamus arcu felis bibendum ut tristique. Rhoncus mattis rhoncus urna neque viverra justo nec ultrices. Sit amet justo donec enim diam vulputate ut. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Vitae elementum curabitur vitae nunc sed velit. Molestie a iaculis at erat pellentesque adipiscing commodo elit. Neque vitae tempus quam pellentesque. Duis at consectetur lorem donec. Amet est placerat in egestas erat imperdiet sed. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Nunc sed augue lacus viverra vitae congue eu. Egestas quis ipsum suspendisse ultrices gravida.

                Arcu non odio euismod lacinia. Eu tincidunt tortor aliquam nulla. Vestibulum morbi blandit cursus risus at ultrices mi tempus. Sit amet nisl suscipit adipiscing. Enim sit amet venenatis urna cursus eget. Ac tortor vitae purus faucibus ornare suspendisse sed nisi. Risus pretium quam vulputate dignissim. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Ut pharetra sit amet aliquam id. Porttitor lacus luctus accumsan tortor posuere ac ut. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Tellus molestie nunc non blandit massa enim nec. Habitant morbi tristique senectus et netus et malesuada. Facilisis leo vel fringilla est ullamcorper eget. At augue eget arcu dictum varius duis at consectetur lorem. Diam ut venenatis tellus in. Metus aliquam eleifend mi in nulla posuere sollicitudin. Faucibus ornare suspendisse sed nisi lacus sed viverra tellus in. Non curabitur gravida arcu ac tortor. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet risus.

                Lacus laoreet non curabitur gravida arcu ac. In mollis nunc sed id semper risus in hendrerit gravida. Suscipit adipiscing bibendum est ultricies integer quis auctor elit sed. Viverra vitae congue eu consequat ac felis donec. Ac felis donec et odio pellentesque diam. Cras adipiscing enim eu turpis egestas pretium aenean pharetra magna. Duis at consectetur lorem donec massa sapien faucibus. Ac auctor augue mauris augue neque. Aenean sed adipiscing diam donec adipiscing. Aliquet sagittis id consectetur purus ut faucibus pulvinar. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt tortor. Urna nunc id cursus metus aliquam. Laoreet suspendisse interdum consectetur libero. Habitant morbi tristique senectus et netus. Eget egestas purus viverra accumsan in. Fames ac turpis egestas maecenas pharetra convallis posuere morbi.

                Eget arcu dictum varius duis. Nisi porta lorem mollis aliquam ut porttitor leo. Tristique senectus et netus et malesuada. Tincidunt lobortis feugiat vivamus at augue. Purus semper eget duis at. Ut tellus elementum sagittis vitae et leo duis ut. Enim ut sem viverra aliquet eget sit amet tellus cras. Dignissim cras tincidunt lobortis feugiat vivamus at augue. Non nisi est sit amet facilisis magna. Orci nulla pellentesque dignissim enim sit amet. Consequat interdum varius sit amet mattis vulputate. Vel quam elementum pulvinar etiam non quam lacus. Venenatis tellus in metus vulputate eu. Elementum eu facilisis sed odio. Pellentesque habitant morbi tristique senectus et. Hendrerit dolor magna eget est lorem ipsum dolor. Lectus arcu bibendum at varius vel.</p>
        </article>
    </div>
    <div class="box-container">
        <footer>
            Footer Content
        </footer>
    </div>
    </body>
</html>
