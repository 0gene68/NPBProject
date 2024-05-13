// 순위표 생성 함수
const createRankingCentralTable = () => {
    const centralTeams = JSON.parse(
        document.getElementById("rankTableCentral").dataset.variable
    );

    // 순위표 HTML 생성
    let tableHTML = "<table>";
    tableHTML +=
        "<tr><th>순위</th><th>팀</th><th>경기</th><th>승</th><th>무</th><th>패</th><th>승률</th><th>승차</th></tr>";

    centralTeams.forEach((team, index) => {
        const { current_rank, teamName, wins, draws, loses } = team;
        const matches = wins + draws + loses;
        const winRate = (wins / (matches - draws)).toFixed(3);
        const difference =
            index > 0
                ? (
                      (centralTeams[0].wins -
                          centralTeams[0].loses -
                          (wins - loses)) /
                      2
                  ).toFixed(1)
                : 0;

        tableHTML += `<tr><td>${current_rank}</td><td>${teamName}</td><td>${matches}</td><td>${wins}</td><td>${draws}</td><td>${loses}</td><td>${winRate}</td><td>${difference}</td></tr>`;
    });

    tableHTML += "</table>";

    return tableHTML;
};

const createRankingPacificTable = () => {
    const pacificTeams = JSON.parse(
        document.getElementById("rankTablePacific").dataset.variable
    );
    // 순위표 HTML 생성
    let tableHTML = "<table>";
    tableHTML +=
        "<tr><th>순위</th><th>팀</th><th>경기</th><th>승</th><th>무</th><th>패</th><th>승률</th><th>승차</th></tr>";

    pacificTeams.forEach((team, index) => {
        const { current_rank, teamName, wins, draws, loses } = team;
        const matches = wins + draws + loses;
        const winRate = (wins / (matches - draws)).toFixed(3);
        const difference =
            index > 0
                ? (
                      (pacificTeams[0].wins -
                          pacificTeams[0].loses -
                          (wins - loses)) /
                      2
                  ).toFixed(1)
                : 0;

        tableHTML += `<tr><td>${current_rank}</td><td>${teamName}</td><td>${matches}</td><td>${wins}</td><td>${draws}</td><td>${loses}</td><td>${winRate}</td><td>${difference}</td></tr>`;
    });

    tableHTML += "</table>";

    return tableHTML;
};

// 순위표 출력
const rankingTableCentral = createRankingCentralTable();
const rankingTablePacific = createRankingPacificTable();

const centralRankTableContainer = document.querySelector("#rankTableCentral");
const pacificRankTableContainer = document.querySelector("#rankTablePacific");

centralRankTableContainer.innerHTML = `
    <div class="rankTable" id="central">
        <img src="storage/images/logos/Central.jpeg" alt="" id="centralLogo">
        <span>2024시즌 센트럴 리그 순위</span>
    </div>
    ${rankingTableCentral}
`;
pacificRankTableContainer.innerHTML = `    
    <div class="rankTable" id="pacific">
        <img src="storage/images/logos/Pacific.png" alt="" id="pacificLogo">
        <span>2024시즌 퍼시픽 리그 순위</span>
    </div>
    ${rankingTablePacific}
`;

/* ---------------------------------------------------------------------- */

// /* 센트럴 투수 li 태그 선택 */
// const centralEra = document.querySelector("#centralPitcher .era");
// const centralWins = document.querySelector("#centralPitcher .wins");
// const centralKs = document.querySelector("#centralPitcher .ks");
// const centralSaves = document.querySelector("#centralPitcher .saves");
// const centralHolds = document.querySelector("#centralPitcher .holds");

// /* 센트럴 투수 이미지 선택 */
// const centralPitcherImage = document.getElementById("centralPitcherWinner");

// /* 센트럴 투수 테이블 선택 */
// const centralEraRank = document.getElementById("centralEraRank");
// const centralWinsRank = document.getElementById("centralWinsRank");
// const centralKsRank = document.getElementById("centralKsRank");
// const centralSavesRank = document.getElementById("centralSavesRank");
// const centralHoldsRank = document.getElementById("centralHoldsRank");

// centralEra.addEventListener("click", function () {
//     centralPitcherImage.src = "{{$cEraWinners[0]->image}}";

//     centralEraRank.style.display = "block";
//     centralWinsRank.style.display = "none";
//     centralKsRank.style.display = "none";
//     centralSavesRank.style.display = "none";
//     centralHoldsRank.style.display = "none";
// });

// centralWins.addEventListener("click", function () {
//     centralPitcherImage.src = "{{$cWinsWinners[0]->image}}";

//     centralEraRank.style.display = "none";
//     centralWinsRank.style.display = "block";
//     centralKsRank.style.display = "none";
//     centralSavesRank.style.display = "none";
//     centralHoldsRank.style.display = "none";
// });

// centralKs.addEventListener("click", function () {
//     centralPitcherImage.src = "{{$cKsWinners[0]->image}}";

//     centralEraRank.style.display = "none";
//     centralWinsRank.style.display = "none";
//     centralKsRank.style.display = "block";
//     centralSavesRank.style.display = "none";
//     centralHoldsRank.style.display = "none";
// });

// centralSaves.addEventListener("click", () => {
//     centralPitcherImage.src = "{{$cSavesWinners[0]->image}}";
//     centralEraRank.style.display = "none";
//     centralWinsRank.style.display = "none";
//     centralKsRank.style.display = "none";
//     centralSavesRank.style.display = "block";
//     centralHoldsRank.style.display = "none";
// });

// centralHolds.addEventListener("click", function () {
//     centralPitcherImage.src = "{{$cHoldsWinners[0]->image}}";

//     centralEraRank.style.display = "none";
//     centralWinsRank.style.display = "none";
//     centralKsRank.style.display = "none";
//     centralSavesRank.style.display = "none";
//     centralHoldsRank.style.display = "block";
// });

// /* ---------------------------------------------------------------------- */
// /* 퍼시픽 투수 li 태그 선택 */
// const pacificEra = document.querySelector("#pacificPitcher .era");
// const pacificWins = document.querySelector("#pacificPitcher .wins");
// const pacificKs = document.querySelector("#pacificPitcher .ks");
// const pacificSaves = document.querySelector("#pacificPitcher .saves");
// const pacificHolds = document.querySelector("#pacificPitcher .holds");

// /* 퍼시픽 투수 이미지 선택 */
// const pacificPitcherImage = document.getElementById("pacificPitcherWinner");

// /* 퍼시픽 투수 테이블 선택 */
// const pacificEraRank = document.getElementById("pacificEraRank");
// const pacificWinsRank = document.getElementById("pacificWinsRank");
// const pacificKsRank = document.getElementById("pacificKsRank");
// const pacificSavesRank = document.getElementById("pacificSavesRank");
// const pacificHoldsRank = document.getElementById("pacificHoldsRank");

// pacificEra.addEventListener("click", function () {
//     pacificPitcherImage.src = "{{$pEraWinners[0]->image}}";

//     pacificEraRank.style.display = "block";
//     pacificWinsRank.style.display = "none";
//     pacificKsRank.style.display = "none";
//     pacificSavesRank.style.display = "none";
//     pacificHoldsRank.style.display = "none";
// });

// pacificWins.addEventListener("click", function () {
//     pacificPitcherImage.src = "{{$pWinsWinners[0]->image}}";

//     pacificEraRank.style.display = "none";
//     pacificWinsRank.style.display = "block";
//     pacificKsRank.style.display = "none";
//     pacificSavesRank.style.display = "none";
//     pacificHoldsRank.style.display = "none";
// });

// pacificKs.addEventListener("click", function () {
//     pacificPitcherImage.src = "{{$pKsWinners[0]->image}}";

//     pacificEraRank.style.display = "none";
//     pacificWinsRank.style.display = "none";
//     pacificKsRank.style.display = "block";
//     pacificSavesRank.style.display = "none";
//     pacificHoldsRank.style.display = "none";
// });

// pacificSaves.addEventListener("click", function () {
//     pacificPitcherImage.src = "{{$pSavesWinners[0]->image}}";

//     pacificEraRank.style.display = "none";
//     pacificWinsRank.style.display = "none";
//     pacificKsRank.style.display = "none";
//     pacificSavesRank.style.display = "block";
//     pacificHoldsRank.style.display = "none";
// });

// pacificHolds.addEventListener("click", function () {
//     pacificPitcherImage.src = "{{$pHoldsWinners[0]->image}}";

//     pacificEraRank.style.display = "none";
//     pacificWinsRank.style.display = "none";
//     pacificKsRank.style.display = "none";
//     pacificSavesRank.style.display = "none";
//     pacificHoldsRank.style.display = "block";
// });

// /* ---------------------------------------------------------------------- */

// /* 센트럴 타자 li 태그 선택 */
// const centralAverage = document.querySelector("#centralBatter .average");
// const centralHomerun = document.querySelector("#centralBatter .homerun");
// const centralRbi = document.querySelector("#centralBatter .rbi");
// const centralHits = document.querySelector("#centralBatter .hits");
// const centralSteals = document.querySelector("#centralBatter .steals");

// /* 센트럴 타자 이미지 선택 */
// const centralBatterImage = document.getElementById("centralBatterWinner");

// /* 센트럴 타자 테이블 선택 */
// const centralAverageRank = document.getElementById("centralAverageRank");
// const centralHomerunRank = document.getElementById("centralHomerunRank");
// const centralRbiRank = document.getElementById("centralRbiRank");
// const centralHitsRank = document.getElementById("centralHitsRank");
// const centralStealsRank = document.getElementById("centralStealsRank");

// centralAverage.addEventListener("click", function () {
//     centralBatterImage.src = "{{$cAverageWinners[0]->image}}";

//     centralAverageRank.style.display = "block";
//     centralHomerunRank.style.display = "none";
//     centralRbiRank.style.display = "none";
//     centralHitsRank.style.display = "none";
//     centralStealsRank.style.display = "none";
// });

// centralHomerun.addEventListener("click", function () {
//     centralBatterImage.src = "{{$cHomerunWinners[0]->image}}";

//     centralAverageRank.style.display = "none";
//     centralHomerunRank.style.display = "block";
//     centralRbiRank.style.display = "none";
//     centralHitsRank.style.display = "none";
//     centralStealsRank.style.display = "none";
// });

// centralRbi.addEventListener("click", function () {
//     centralBatterImage.src = "{{$cRbiWinners[0]->image}}";

//     centralAverageRank.style.display = "none";
//     centralHomerunRank.style.display = "none";
//     centralRbiRank.style.display = "block";
//     centralHitsRank.style.display = "none";
//     centralStealsRank.style.display = "none";
// });

// centralHits.addEventListener("click", function () {
//     centralBatterImage.src = "{{$cHitsWinners[0]->image}}";

//     centralAverageRank.style.display = "none";
//     centralHomerunRank.style.display = "none";
//     centralRbiRank.style.display = "none";
//     centralHitsRank.style.display = "block";
//     centralStealsRank.style.display = "none";
// });

// centralSteals.addEventListener("click", function () {
//     centralBatterImage.src = "{{$cStealsWinners[0]->image}}";

//     centralAverageRank.style.display = "none";
//     centralHomerunRank.style.display = "none";
//     centralRbiRank.style.display = "none";
//     centralHitsRank.style.display = "none";
//     centralStealsRank.style.display = "block";
// });

// /* ---------------------------------------------------------------------- */

// /* 퍼시픽 타자 li 태그 선택 */
// const pacificAverage = document.querySelector("#pacificBatter .average");
// const pacificHomerun = document.querySelector("#pacificBatter .homerun");
// const pacificRbi = document.querySelector("#pacificBatter .rbi");
// const pacificHits = document.querySelector("#pacificBatter .hits");
// const pacificSteals = document.querySelector("#pacificBatter .steals");

// /* 퍼시픽 타자 이미지 선택 */
// const pacificBatterImage = document.getElementById("pacificBatterWinner");

// /* 퍼시픽 타자 테이블 선택 */
// const pacificAverageRank = document.getElementById("pacificAverageRank");
// const pacificHomerunRank = document.getElementById("pacificHomerunRank");
// const pacificRbiRank = document.getElementById("pacificRbiRank");
// const pacificHitsRank = document.getElementById("pacificHitsRank");
// const pacificStealsRank = document.getElementById("pacificStealsRank");

// pacificAverage.addEventListener("click", function () {
//     pacificBatterImage.src = "{{$pAverageWinners[0]->image}}";

//     pacificAverageRank.style.display = "block";
//     pacificHomerunRank.style.display = "none";
//     pacificRbiRank.style.display = "none";
//     pacificHitsRank.style.display = "none";
//     pacificStealsRank.style.display = "none";
// });

// pacificHomerun.addEventListener("click", function () {
//     pacificBatterImage.src = "{{$pHomerunWinners[0]->image}}";

//     pacificAverageRank.style.display = "none";
//     pacificHomerunRank.style.display = "block";
//     pacificRbiRank.style.display = "none";
//     pacificHitsRank.style.display = "none";
//     pacificStealsRank.style.display = "none";
// });

// pacificRbi.addEventListener("click", function () {
//     pacificBatterImage.src = "{{$pRbiWinners[0]->image}}";

//     pacificAverageRank.style.display = "none";
//     pacificHomerunRank.style.display = "none";
//     pacificRbiRank.style.display = "block";
//     pacificHitsRank.style.display = "none";
//     pacificStealsRank.style.display = "none";
// });

// pacificHits.addEventListener("click", function () {
//     pacificBatterImage.src = "{{$pHitsWinners[0]->image}}";

//     pacificAverageRank.style.display = "none";
//     pacificHomerunRank.style.display = "none";
//     pacificRbiRank.style.display = "none";
//     pacificHitsRank.style.display = "block";
//     pacificStealsRank.style.display = "none";
// });

// pacificSteals.addEventListener("click", function () {
//     pacificBatterImage.src = "{{$pStealsWinners[0]->image}}";

//     pacificAverageRank.style.display = "none";
//     pacificHomerunRank.style.display = "none";
//     pacificRbiRank.style.display = "none";
//     pacificHitsRank.style.display = "none";
//     pacificStealsRank.style.display = "block";
// });
