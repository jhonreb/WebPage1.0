i18next.init({
    lng: 'en',
    resources: {
      en: {
        translation: {
          

            "nav_home": "Home",
            "nav_ingreso" : "Ingreso",
            "nav_celebrate": "Celebración",
            "nav_idioma" : "Idioma",
            "nav_message": "Mensaje",
            "home_title": "Comparte tu amor, dona ahora!",
            "home_description": "Tu donación puede marcar la diferencia entre la esperanza y la desesperación para aquellos que más lo necesitan. ¡Dona y cambia vidas!",
            "start_donating": "Empezar a Donar",
            "giving_title": "Empieza a ayudar con <br> Donaciones",
            "giving_subtitle1": "Sorprende",
            "giving_description1": "Sorprende a otros, transforma su día.",
            "giving_subtitle2": "Inspira",
            "giving_description2": "Inspira cambios positivos, transforma realidades.",
            "giving_subtitle3": "Mucho amor",
            "giving_description3": "Mucho amor, la fuerza que une.",
            "celebrate_title": "Donando <br> Celebran Todos",
            "celebrate_description": "En la magia de las donaciones, celebra con mucho amor cada acto generoso que transforma vidas y dibuja sonrisas en corazones necesitados.",
            "send_wishes": "Enviar Buenos Deseos",
            "message_title": "Envíanos Mensajes o <br> Recomendaciones!",
            "message_input_placeholder": "Escribir un mensaje",
            "send_message": "Enviar Mensaje",
            "footer_logo": "Donaciones",
            "footer_description": "Dona y cambia vidas",
            "footer_ranking": "Ranking",
            "footer_top_donor": "Top Donador",
            "footer_monthly_donor": "Donador del Mes",
            "footer_help": "Ayuda",
            "footer_support": "Atención",
            "footer_report_issue": "Reportar Problema",
            "footer_contact_us": "Contáctanos",
            "footer_available_in": "Disponible en",
            "footer_copy": "© Donaciones. Todos los derechos reservados"
        }
      },
      es: {
        translation: {
            "nav_home": "Home",
            "nav_celebrate": "Celebrate",
            "nav_idioma" : "Language",
            "nav_message": "Message",
            "nav_ingreso" : "Join",
            "home_title": "Share your love, <br> donate now!",
            "home_description": "Your donation can make the difference between hope and despair for those who need it the most. Donate and change lives!",
            "start_donating": "Start Donating",
            "giving_title": "Start helping with <br> Donations",
            "giving_subtitle1": "Surprise",
            "giving_description1": "Surprise others, transform their day.",
            "giving_subtitle2": "Inspire",
            "giving_description2": "Inspire positive changes, transform realities.",
            "giving_subtitle3": "Lots of love",
            "giving_description3": "Lots of love, the force that unites.",
            "celebrate_title": "Donating <br> Everyone Celebrates",
            "celebrate_description": "In the magic of donations, celebrate with love every generous act that transforms lives and brings smiles to needy hearts.",
            "send_wishes": "Send Good Wishes",
            "message_title": "Send Us Messages or <br> Recommendations!",
            "message_input_placeholder": "Write a message",
            "send_message": "Send Message",
            "footer_logo": "Donaciones",
            "footer_description": "Donate and change lives",
            "footer_ranking": "Ranking",
            "footer_top_donor": "Top Donor",
            "footer_monthly_donor": "Monthly Donor",
            "footer_help": "Help",
            "footer_support": "Support",
            "footer_report_issue": "Report Issue",
            "footer_contact_us": "Contact Us",
            "footer_available_in": "Available in",
            "footer_copy": "© Donaciones. All rights reserved"
        }
      }
    }
  }, function(err, t) {
    // inicialización completada
    updateContent();
  });
  
  function updateContent() {
    var elements = document.querySelectorAll('[data-i18n]');
    for (var i = 0; i < elements.length; i++) {
      var key = elements[i].getAttribute('data-i18n');
      elements[i].innerHTML = i18next.t(key); // Utilizar innerHTML en lugar de textContent
    }
  }
  
  
  function changeLanguage() {
    var currentLanguage = i18next.language;
    var newLanguage = currentLanguage === 'en' ? 'en' : 'en';
    i18next.changeLanguage(newLanguage, function(err, t) {
      updateContent();
    });
  }

  function changeLanguageINGLES() {
    var currentLanguage = i18next.language;
    var newLanguage = currentLanguage === 'en' ? 'es' : 'es';
    i18next.changeLanguage(newLanguage, function(err, t) {
      updateContent();
    });
  }
  
