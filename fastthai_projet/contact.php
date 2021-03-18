<?php
session_start();

require_once('partials/header1.inc');?>


<div class= "container">
            <div class="row mt-5">
                    <section  class="col-6 ">
                        <form class='col-9 offset-3'>
                        <div class="card-header text-center bg-dark text-white h3"> FORMULAIRE D'INSCRIPTION</div>
                            <div>
                                <label htmlFor="name" class="col-form-label h5">Nom</label>
                                <input type="text" id="name" name="name" class="form-control" />
                            </div>
                            <div>
                                <label htmlFor="last_name" class="form-check-label h5">Prénom </label>
                                <input type="text" id="last_name" name="last_name" class="form-control" />
                            </div>
                            <div>
                                <label htmlFor="telephone" class="form-check-label h5">Téléphone </label>
                                <input type="tel" id="telephone" name="telephone" class="form-control" />
                            </div>
                            <div>
                                <label htmlFor="mail" class="form-check-label h5">Email </label>
                                <input type="email" id="mail" name="mail" class="form-control" />
                            </div>
                            <div>
                                <label htmlFor="message" class="form-check-label h5">Message </label>
                                <textarea id="message" name="message" class="form-control"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-warning col-12" type="submit"><strong>Valider</strong> </button>
                            </div>
                        </form>
                    </section>
                    <section class="col-6 pt-5">

                        <h1 class="text-center h1 text-warning" >Contactez-nous</h1>
                        <div id="mail" class="text-center mt-5">

                        <i class="fas fa-envelope text-warning h3" size ="50"></i>
                            
                            <p>
                <a class= 'text-warning h5' style="text-decoration :none;" href="mailto:e.mail@gmail.com"  >
                                    <span > e.email94@gmail.com</span>
                                </a>
                            </p>
                        </div>
                        <div id="tel" class="text-center h5">
                           <i class="fas fa-phone text-warning h3"></i>
                            <p><span>+33 1 82 39 12 90</span></p>
                        </div>

                        <div id="adress" class="text-center h5">
                        <i class="fas fa-map-marker-alt text-warning h3"></i>
                            <p><span>31 Rue Charles de Gaulle <br />94 140 Alfortville</span> </p>
                        </div>

                    </section>
                </div>
                <iframe class="mt-5 mb-5 mx-5" title="home" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2627.2735068610505!2d2.4136529154914097!3d48.814842711726335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e672fd8ead719b%3A0x4e239536d941efb4!2s31%20Rue%20Charles%20de%20Gaulle%2C%2094140%20Alfortville!5e0!3m2!1sfr!2sfr!4v1613054987569!5m2!1sfr!2sfre "target="_blank"  width="95%" height="400" frameborder="0"  allowfullscreen="" aria-hidden="false" tabindex="0"/>
                
        </div>

        <?php require_once('partials/footer1.inc');?>