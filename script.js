//prend un texte et renvoie le texte en minuscule sans accents/espaces/tirets
function retirerAccents(str) {
  return str
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/-/g, " ")
    .replace(".", "")
    .replace(/é/g, "e")
    .toLowerCase();
}

//verifie si une image est disponible localement
async function checkImage(adr) {
    try {
        const res = await fetch(adr, { method: "HEAD" });
        return res.ok;
    } catch {
        return false;
    }
}


// Retour à la page précédente
function retour() {
    window.history.back();
}

//fonction pour generer les actualites sur actus.php
function genererActu () {

    //recuperation fichier json contenant les actus
    fetch ("data/actus.json")
        .then((reponse) => reponse.json())   
        .then((liste_actus) => {
            
            const conteneur = document.querySelector(".actus");

            //tri actus en fonction de la date (plus recent d'abord)
            liste_actus.sort((a,b) => new Date(b.date)- new Date(a.date))
            
            //creation de chaque actu en html
            liste_actus.forEach((actu) => {
                //gestion affichage date
                const date = new Date(actu.date);
                const mois = ["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"];
                const dateTxt = [date.getDate(), mois[date.getMonth()], date.getFullYear()];
                const divActu = document.createElement("a");

                divActu.setAttribute("href", `actu.php?id=${actu.id}`)
                divActu.innerHTML = 
                `<div class='actu'>
                    <span class="titre-info">${actu.titre}</span>
                    <div class="img-txt-info">
                        <img class="img-info rounded" src="img/actus/${actu.id}.webp" alt="${actu.altImg}">
                        <p> 
                        <span class="cat-info">${actu.categorie}</span><br>
                        ${actu.sous_titre}<br><br>
                        <span class="date">Articlé publié le ${dateTxt[0]} ${dateTxt[1]} ${dateTxt[2]}.</span>
                        </p>
                    </div>
                </div>`
                conteneur.appendChild(divActu);
            })

            ajusterFond();
        }) 
}

//generer l'affichage des personnages sur lstPersos.php
function genererPersos() {
    fetch("data/characters.json")
        .then(reponse => reponse.json())
        .then(async res => {
            const conteneur = document.querySelector(".ctn-card")
            const searchInput = document.getElementById("search")
            let data = []
            let persos = []
            
            // verifier et garder que les persos avec une image disponible
            const verifications = res.map(async (img) => {
                const imgDispo = await checkImage(`img/api/characters/${img.id}.webp`)
                return imgDispo ? img : null
            })

            // Attendre TOUTES les vérifications
            data = (await Promise.all(verifications)).filter(img => img !== null)

            persos = data.map(p => {
                const divPerso = document.createElement("div")
                divPerso.classList.add("card-perso")
                let camp = "PIRATE"
                if (typeof p.crew !== 'undefined') { //Affichage du camp au dessus de la prime
                    if (p.crew.name == "Armée Révolutionnaire") 
                        camp = "RÉVOLUTIONNAIRE"
                    else if (p.crew.name == "Marine") 
                        camp = "MARINE"
                    else if (p.crew.id == 89 || p.crew.id == 90)
                        camp = "GOUVERNEMENT"
                } else 
                    camp = "NEUTRE"

                var prime = `<h4><img src="img/berrysymbol.png" alt="Symbole Berry">${p.bounty}</h4>`
                if (p.status=="Décédé") 
                    prime = `<h4><s><img src="img/berrysymbol.png" alt="Symbole Berry">${p.bounty}</s></h4>`
                if (p.bounty == null)
                    prime =""

                divPerso.innerHTML = 
                `<a href="perso.php?id=${p.id}" style="color: inherit;">
                    <div class="camp">${camp}</div>
                    <img class="img-card-perso" src="img/api/characters/${p.id}.webp" alt="Image de ${p.name}">
                    <div class="card-perso-body">
                        <h3 class="card-title">${p.name.toUpperCase()}</h3>
                        ${prime}
                        <p class="card-text"></p>
                    </div>
                </a>`
                conteneur.appendChild(divPerso)                
                return {element: divPerso, name: p.name}
                }
            )

            ajusterFond();

            //génerer une liste des éléments disponibles dans la console
            /*dispos = data.map(e => {
                return {id:e.id, name: e.name}})
            console.log(JSON.stringify(dispos))*/

            //gestion de l'affichage en fonction de ce qui est entré sur la barre de recherche
            searchInput.addEventListener("input", e => {
                const recherche = retirerAccents(e.target.value) 
                persos.forEach(p => {
                    const visible = retirerAccents(p.name).includes(recherche)
                    p.element.classList.toggle("hide", !visible)
                })
                ajusterFond();
            })
            
        })
}

//generer l'affichage des équipages sur lstEquipages.php
function genererCrews() {
    fetch("data/crews.json")
        .then(reponse => reponse.json())
        .then(async res => {
            const conteneur = document.querySelector(".ctn-card")
            const searchInput = document.getElementById("search")
            let data = []
            let crews = []
            
            // verifier et garder que les equipages avec une image disponible
            const verifications = res.map(async (img) => {
                const imgDispo = await checkImage(`img/api/crews/${img.id}.webp`)
                return imgDispo ? img : null
            })

            // Attendre TOUTES les vérifications
            data = (await Promise.all(verifications)).filter(img => img !== null)

            crews = data.map(crew => {
                const divCrew = document.createElement("div");
                divCrew.classList.add("card-lstcrew");
                divCrew.innerHTML = 
                `<a href="crew.php?id=${crew.id}" style="color: inherit;">
                    <img class="img-lstcrew rounded" src="img/api/crews/${crew.id}.webp" alt="Image de ${crew.name}">
                    <div class="nom-lstcrew">${crew.short_name}</div>
                </a>`
                conteneur.appendChild(divCrew)
                return {element: divCrew, name: crew.name, roman_name: crew.roman_name}
                }
            )

            ajusterFond();

            //génerer une liste des éléments disponibles dans la console
            /*dispos = data.map(e => {
                return {id:e.id, name: e.name}})
            console.log(JSON.stringify(dispos))*/

            //gestion de l'affichage en fonction de ce qui est entré sur la barre de recherche
            searchInput.addEventListener("input", e => {
                const recherche = retirerAccents(e.target.value);
                crews.forEach(crew => {
                    const visible = (retirerAccents(crew.name).includes(recherche) || retirerAccents(crew.roman_name).includes(recherche));
                    crew.element.classList.toggle("hide", !visible);
                })
                ajusterFond();
            })
        })
}

//generer l'affichage des lieux sur lstLieux.php
function genererLieux() {
    fetch("data/locates.json")
        .then(reponse => reponse.json())
        .then(async res => {
            const conteneur = document.querySelector(".ctn-card")
            const searchInput = document.getElementById("search")
            let locs = []
            let data = []
            
            // verifier et garder que les lieux avec une image disponible
            const verifications = res.map(async (l) => {
                const imgDispo = await checkImage(`img/api/locates/${l.id}.webp`)
                return imgDispo ? l : null
            })

            // Attendre TOUTES les vérifications
            data = (await Promise.all(verifications)).filter(l => l !== null)


            locs = data.map(loc => {
                const divLoc = document.createElement("div")
                divLoc.classList.add("card-lstcrew");
                divLoc.innerHTML = 
                `<a href="loc.php?id=${loc.id}" style="color: inherit;">
                    <img class="img-lstcrew rounded" src="img/api/locates/${loc.id}.webp" alt="Image de ${loc.name}">
                    <div class="nom-lstcrew">${loc.name}</div>
                </a>`
                conteneur.appendChild(divLoc)
                return {element: divLoc, name: loc.name, roman_name: loc.roman_name}
                }
            )

            ajusterFond();

            //génerer une liste des éléments disponibles dans la console
            /*dispos = data.map(e => {
                return {id:e.id, name: e.name}})
            console.log(JSON.stringify(dispos))*/

            //gestion de l'affichage en fonction de ce qui est entré sur la barre de recherche
            searchInput.addEventListener("input", e => {
                const recherche = retirerAccents(e.target.value)
                locs.forEach(loc => {
                    const visible = (retirerAccents(loc.name).includes(recherche) || retirerAccents(loc.roman_name).includes(recherche))
                    loc.element.classList.toggle("hide", !visible)
                })
                ajusterFond();
            })
        })
}

//generer l'affichage des fruits sur lstFruits.php
function genererFruits() {
    fetch("data/fruits.json")
        .then(reponse => reponse.json())
        .then(res => {
            const conteneur = document.querySelector(".ctn-card")
            const searchInput = document.getElementById("search")
            let data = []
            let fruits = []

            // verifier et garder que les fruits avec une image disponible
            data = res.filter(f => f.filename !== "https://images.api-onepiece.com/fruits/")

            fruits = data.map(fruit => {
                const divFruit = document.createElement("div")
                divFruit.classList.add("card-lstcrew");
                var img = fruit.filename
                if (img=="")
                    img = `img/api/fruits/${fruit.id}.webp`
                divFruit.innerHTML = 
                `<a href="fruit.php?id=${fruit.id}" style="color: inherit;">
                    <img class="img-lstcrew rounded" src="${img}" alt="Image du ${fruit.name}">
                    <div class="nom-lstcrew">${fruit.roman_name}</div>
                </a>`
                conteneur.appendChild(divFruit)
                return {element: divFruit, name: fruit.name, roman_name: fruit.roman_name}
                }
            )

            ajusterFond();

            //génerer une liste des éléments disponibles dans la console
            /*dispos = data.map(e => {
                return {id:e.id, name: e.name}})
            console.log(JSON.stringify(dispos))*/

            //gestion de l'affichage en fonction de ce qui est entré sur la barre de recherche
            searchInput.addEventListener("input", e => {
                const recherche = retirerAccents(e.target.value);
                fruits.forEach(fruit => {
                    const visible = (retirerAccents(fruit.name).includes(recherche) || retirerAccents(fruit.roman_name).includes(recherche))
                    fruit.element.classList.toggle("hide", !visible)
                })
                ajusterFond();
            })
        })
}

//generer les plateformes pour regarder One Piece sur les pages de guide
function genererGuide(n) {
    fetch("data/guides.json")
        .then(reponse => reponse.json())
        .then(res => {
            const conteneur = document.querySelector(".ctn-guide");
            const dispo = ["Episodes", "Chapitres", "Numéro des films"];
            const data = res[n];

            // verifier et garder que les fruits avec une image disponible
            data.forEach(plateforme => {
                const div = document.createElement("div");
                div.classList.add("plateforme");
                var img = `img/logos/${plateforme.logo}`;
                var prix = (plateforme.price > 0) ? `${plateforme.price}€` : "Gratuit"; 
                var prix_desc = plateforme.price_desc ? `<h4>${plateforme.price_desc}</h4>` : "";
                div.innerHTML = 
                `<a href="${plateforme.link}" target="_blank" style="color: inherit;">
                    <div class="row">
                        <div class="col-md-10 info">
                            <h2>
                                <img src="${img}" alt="Logo de ${plateforme.name}">
                                ${plateforme.name}
                            </h2>
                            <p>${dispo[n]} disponibles : ${plateforme.dispo}</p>
                            <p>${plateforme.description}</p>
                        </div>
                        <div class="col-md-2 prix">
                            <h2 style="margin:0px;">${prix}</h2>
                            ${prix_desc}
                        </div>
                    </div>
                </a>`;
                conteneur.appendChild(div);
                }
            )

            ajusterFond();
        })
}

//gestion du quiz sur quiz.php
function quiz(categorie) {
    fetch(`data/${categorie}.json`)
        .then(reponse => reponse.json())
        .then(async res => {
            const conteneur = document.querySelector(".ctn-card")
            const searchInput = document.getElementById("search")
            let dispos = []
            
            // verifier et garder que les lieux avec une image disponible
            const verifications = res.map(async (l) => {
                const imgDispo = await checkImage(`img/api/${categorie}/${l.id}.webp`)
                return imgDispo ? l : null
            })

            // Attendre TOUTES les vérifications
            dispos = (await Promise.all(verifications)).filter(l => l !== null)

            let data = dispos.map(e => {
                return {id:e.id, name:e.name}
            }) 

            //melanger le tableau data
            for (let i = data.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [data[i], data[j]] = [data[j], data[i]];
            }

            var lst_quiz = data.slice(0,20) //maximum 20 questions
            
            if (categorie=="characters")
                var questionTxt = "Qui est ce personnage (nom complet) ?"
            else if (categorie=="crews")
                var questionTxt = "Quel est cet équipage ?"
            else if (categorie=="locates")
                var questionTxt = "Quel est cet endroit ?"

            let score = 0
            let nbQuestion = 0
            var image = document.getElementById("img-quiz")
            image.setAttribute("alt", `Image du quiz`)
            image.setAttribute("src", `img/api/${categorie}/${lst_quiz[0].id}.webp`)
            var affichageQuestion =  document.getElementById("question")
            affichageQuestion.innerHTML = questionTxt
            var affichageScore = document.getElementById("score-quiz")
            const btnValider = document.getElementById("btn-valider")
            const btnTerminer = document.getElementById("btn-terminer")
            const input = document.getElementById("input-quiz")

            setTimeout(ajusterFond, 500);

            //valider une reponse dans le quiz
            function valider() {

                if (retirerAccents(input.value) == retirerAccents(lst_quiz[nbQuestion].name))
                    score++

                nbQuestion++   
                input.value=""   

                if (nbQuestion == lst_quiz.length) { //si toutes les questions ont été posées
                    input.style.display = "none"
                    if (score==nbQuestion) {//affichage spécial si score obtenu est parfait
                        image.setAttribute("src", "img/fin-quiz-parfait.webp")
                        affichageQuestion.innerHTML = "Quiz terminé, félicitations !"
                    }
                    else {
                        image.setAttribute("src", "img/fin-quiz-normal.webp")
                        affichageQuestion.innerHTML = "Quiz terminé !"
                    }
                    affichageScore.style.display = "block"
                    affichageScore.innerHTML = `Votre score est de ${score} sur ${nbQuestion}.`
                    btnValider.style.display = "none"
                    btnTerminer.style.display = "block"
                }
                else {
                    image.setAttribute("src", `img/api/${categorie}/${lst_quiz[nbQuestion].id}.webp`)
                }

                ajusterFond();

            }

            btnValider.addEventListener("click", valider);
            input.addEventListener("keyup", (event) => {
            if (event.key === "Enter") {
                valider();
            }
            })

        })
}

//generer la liste des films dans le popup sur guide-film.php
function genererFilms() {
    fetch("data/films.json")
        .then(reponse => reponse.json())
        .then(res => {
            const conteneur = document.getElementById("tableau-films");

            res.forEach(film => {
                const tr = document.createElement("tr");
                tr.classList.add("align-middle");
                //ecrire date de sortie
                const date = new Date(film.release_date);
                const mois = ["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"];
                const dateTxt = [date.getDate(), mois[date.getMonth()], date.getFullYear()];
                tr.innerHTML = `<td>${film.id}</td>
                <td><img src="img/films/${film.id}.webp" alt="Affiche de ${film.title}" style="width:120px; "></td>
                <td><strong>${film.title}<strong></td>
                <td>${dateTxt[0]} ${dateTxt[1]} ${dateTxt[2]}</td>
                `;
                conteneur.appendChild(tr);
                }
            )
        })
}

// Vérifier si l'utilisateur a déjà coché "ne plus afficher"
function checkPopup() {
    const dontShow = localStorage.getItem('hideSpoilerWarning');
    
    if (dontShow !== 'true') {
        showPopup();
    }
}

// Afficher le popup
function showPopup() {
    document.getElementById('popupBg').classList.add('show');
    document.getElementById('popup').classList.add('show');
    document.body.style.overflow = 'hidden'; // Empêche le scroll
}

// Fermer le popup
function closePopup(check) {
    if (check) { //si le popup a une case a cocher
        const checkbox = document.getElementById('dontShowAgain');
        // Si la case est cochée, sauvegarder le choix
        if (checkbox.checked) {
            localStorage.setItem('hideSpoilerWarning', 'true');
        }
    }
    document.getElementById('popupBg').classList.remove('show');
    document.getElementById('popup').classList.remove('show');
    document.body.style.overflow = ''; // Réactive le scroll
}

//changer la taille de l'image de fond en fonction de la taille du contenu (dans .content)
function ajusterFond() {
    const bg = document.querySelector('.bg');
    const blurBg = document.querySelector('.blur-bg');
    const content = document.querySelector('.content');
    
    // Prend la hauteur TOTALE de la page
    const hauteurTotale = content.scrollHeight + 150;
    
    bg.style.height = hauteurTotale + 'px';
    blurBg.style.height = hauteurTotale + 'px';
}

//ajuster la taille de l'image de fond au chargement de la page
window.addEventListener('load', ajusterFond);
// Appeler au redimensionnement de l'image de fond lorsque zoom/dézoom ou changement de taille de fenêtre
window.addEventListener('resize', ajusterFond);