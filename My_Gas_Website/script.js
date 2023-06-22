function calculateCost() {
    var kilovatoures = parseInt(document.getElementById('kilovatoures').value);
    var squareMeters = parseInt(document.getElementById('squareMeters').value);
    var days = parseInt(document.getElementById('days').value);

    var energyCharge = 0;
    var utilityCharge = 0;
    var municipalityCost = 0;
    var totalCost = 0;

    // Calculate energy charge
    if (kilovatoures <= 1600) {
        energyCharge = 0.00623;
    } else if (kilovatoures <= 2000) {
        energyCharge = 0.00768;
    } else {
        energyCharge = 0.00915;
    }

    // Calculate utility charge
    if (kilovatoures <= 1600) {
        utilityCharge = 0.01315;
    } else if (kilovatoures <= 2000) {
        utilityCharge = 0.01480;
    } else {
        utilityCharge = 0.01625;
    }

    // Calculate municipality cost
    if (squareMeters <= 50) {
        municipalityCost = 0.12;
    } else if (squareMeters <= 90) {
        municipalityCost = 0.20;
    } else {
        municipalityCost = 0.31;
    }

    // Calculate total cost
    var municipalityCharge = squareMeters * municipalityCost * (days / 365);
    var yko = kilovatoures * utilityCharge * (days / 365);
    var totalCost = kilovatoures * energyCharge
    var totalCharge = municipalityCharge + yko + totalCost;

    alert('Το τελικό κόστος είναι: ' + totalCharge.toFixed(2) + ' €');
}