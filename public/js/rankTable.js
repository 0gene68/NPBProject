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
        const { rank_2023, teamName, wins, draws, loses } = team;
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

        tableHTML += `<tr><td>${rank_2023}</td><td>${teamName}</td><td>${matches}</td><td>${wins}</td><td>${draws}</td><td>${loses}</td><td>${winRate}</td><td>${difference}</td></tr>`;
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
        const { rank_2023, teamName, wins, draws, loses } = team;
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

        tableHTML += `<tr><td>${rank_2023}</td><td>${teamName}</td><td>${matches}</td><td>${wins}</td><td>${draws}</td><td>${loses}</td><td>${winRate}</td><td>${difference}</td></tr>`;
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
        <span>2023시즌 센트럴 리그 순위</span>
    </div>
    ${rankingTableCentral}
`;
pacificRankTableContainer.innerHTML = `    
    <div class="rankTable" id="pacific">
        <img src="storage/images/logos/Pacific.png" alt="" id="pacificLogo">
        <span>2023시즌 퍼시픽 리그 순위</span>
    </div>
    ${rankingTablePacific}
`;
