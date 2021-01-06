const tabButtons = document.querySelectorAll(".tabContainer .buttonContainer button")
const tabPanels = document.querySelectorAll(".tabContainer .tabPanel")

function showPanel(panelIndex) {
    tabButtons.forEach((node) => {
        node.style.backgroundColor = ""
        node.style.color = ""
    })

    tabButtons[panelIndex].style.backgroundColor = "#fff"
    tabButtons[panelIndex].style.color = "black"

    tabPanels.forEach((node) => {
        node.style.display = "none"
    })

    tabPanels[panelIndex].style.display = "block"
    tabPanels[panelIndex].style.backgroundColor = '#ffffff'

}