const moisNoms = [
    "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
    "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
];
const joursNoms = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
const joursParMois = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
const annee = 2026;

let moisActuel = 0; // Janvier

function genererCalendrierMois(mois) {
    const container = document.getElementById("calendrier-mensuel");
    container.innerHTML = "";

    // Navigation
    const nav = document.createElement("div");
    nav.style.display = "flex";
    nav.style.justifyContent = "space-between";
    nav.style.alignItems = "center";
    nav.style.marginBottom = "1rem";

    const prevBtn = document.createElement("button");
    prevBtn.textContent = "←";
    prevBtn.className = "btn-rdv";
    prevBtn.disabled = (mois === 0);
    prevBtn.onclick = () => {
        if (moisActuel > 0) {
            moisActuel--;
            genererCalendrierMois(moisActuel);
        }
    };

    const nextBtn = document.createElement("button");
    nextBtn.textContent = "→";
    nextBtn.className = "btn-rdv";
    nextBtn.disabled = (mois === 11);
    nextBtn.onclick = () => {
        if (moisActuel < 11) {
            moisActuel++;
            genererCalendrierMois(moisActuel);
        }
    };

    const titre = document.createElement("h3");
    titre.textContent = `${moisNoms[mois]} ${annee}`;
    titre.style.flex = "1";
    titre.style.textAlign = "center";

    nav.appendChild(prevBtn);
    nav.appendChild(titre);
    nav.appendChild(nextBtn);
    container.appendChild(nav);

    // Calendrier
    const calendrier = document.createElement("div");
    calendrier.className = "calendrier";

    // Jours de la semaine
    for (let j = 0; j < 7; j++) {
        const nomJour = document.createElement("div");
        nomJour.className = "nom-jour";
        nomJour.textContent = joursNoms[j];
        calendrier.appendChild(nomJour);
    }

    // Premier jour du mois (0 = dimanche, 1 = lundi, ...)
    const premierJour = new Date(annee, mois, 1).getDay();
    let decalage = premierJour === 0 ? 6 : premierJour - 1;

    // Cases vides avant le 1er
    for (let v = 0; v < decalage; v++) {
        const vide = document.createElement("div");
        vide.className = "jour-vide";
        calendrier.appendChild(vide);
    }

    // Jours du mois
    let nbJours = joursParMois[mois];
    if (mois === 1 && ((annee % 4 === 0 && annee % 100 !== 0) || (annee % 400 === 0))) {
        nbJours = 29;
    }
    for (let d = 1; d <= nbJours; d++) {
        const jour = document.createElement("div");
        jour.className = "chiffre-jour";
        jour.innerHTML = d;
        calendrier.appendChild(jour);
    }
    container.appendChild(calendrier);
}

document.addEventListener("DOMContentLoaded", () => {
    genererCalendrierMois(moisActuel);
});