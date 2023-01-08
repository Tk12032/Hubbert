<?php 
/* Template Name: PageRecherche */
get_header(); ?>

<div class = "recherchannonce" style="padding: 100px 50px;"> 

    <aside class="filtres" style="width:270px">
        <div class ="filtre-check-box">
            <div class="check">  
            <input class="checkbox-effect" id="checkoutils" type="checkbox" name="checkoutils" checked>
                <label for="checkoutils">Outils</label>
            </div>
            <div class="check">
                <input class="checkbox-effect" id="checkservices" type="checkbox" name="checkservices" checked>
                <label for="checkservices">Services</label>
            </div>
        </div>

            

        <div style="display:flex; flex-direction:column">
            <label for="prix">Prix</label>
            <input id="prix" type="range" name="prix" value="15" min="1" max="100" oninput="this.nextElementSibling.value = this.value + ' €/j'">
            <output style="margin:10px 0px">15 €/j</output>
        </div>

        <div style="display:flex; flex-direction:column">
            <label for="distance">Distance</label>
            <input id="distance" type="range" name="distance" value="10" min="1" max="100" oninput="this.nextElementSibling.value = this.value + ' km'">
            <output style="margin:10px 0px">10 km</output>
        </div>

        <div class="range_container">
            <div><label>Jours</label></div>
                <div class="sliders_control">
                    <input id="fromSlider" type="range" value="0" min="0" max="6" oninput="doublslider()">
                    
                    <input id="toSlider" type="range" value="6" min="0" max="6" oninput="doublslider()">   
                </div>
            <div style="display:flex;justify-content:space-between;margin-top:10px"><output id="startday">Lundi</output><output id="endday">Dimanche</output></div>
        </div>


        <div class="range_container">
            <div><label>Heures</label></div>
                <div class="sliders_control">
                    <input id="fromSlider2" type="range" value="7" min="7" max="20" oninput="doublslider2()">
                    
                    <input id="toSlider2" type="range" value="20" min="7" max="20" oninput="doublslider2()">   
                </div>
            <div style="display:flex;justify-content:space-between;margin-top:10px"><output id="starthour">7h</output><output id="endhour">20h</output></div>
        </div>
        
        <button class="vert" style="display:flex; width:fit-content;padding:10px;align-items:center" onclick="filter()">
            <img style="width:20px" class="recherchepicto" src="<?php echo get_template_directory_uri() ?>/assets/img/picto_recherche_inact.svg">
            <p style="margin:0px 10px;">C'est parti !</p>
        </button>
    </aside>

    <section style="width:100%" id="parent" class="recherche">

        

        <div id="readmore"></div>
    </section>

</div>


<?php get_footer(); ?>
