$(document).ready(function () {
    displayBranches();
});

function getEatTypeAndBranchFromUrl() {
    var url = window.location.href;
    var parts = url.split("?")[1].split("/");

    var eatType = "";
    var franchisee = "";

    parts.forEach((part) => {
        if (part.startsWith("tp=")) {
            eatType = part.split("=")[1];
        } else if (part.startsWith("franchise=")) {
            franchisee = part.split("=")[1];
        }
    });

    return { eatType: eatType, franchisee: franchisee };
}

function displayBranches() {
    var { eatType, franchisee } = getEatTypeAndBranchFromUrl();
    var formattedFranchisee = franchisee
        .replace(/([a-z])([A-Z])/g, "$1-$2")
        .toLowerCase();
    var form = $("#formGroup1");
}

function getFranchiseImage(franchise) {
    switch (franchise) {
        case "potato-corner":
            return "PotCor.png";
        case "auntie-annes":
            return "AuntieAnn.png";
        case "macao-imperial":
            return "MacaoImp.png";
        default:
            return "default-image.png";
    }
}
