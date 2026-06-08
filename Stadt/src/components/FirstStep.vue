<script setup>
import InfoCard from './InfoCard.vue'
import Checklist from './Checklist.vue'
</script>

<template>
  <main class="page">
    <div class="header">
      <div class="title-box">
        <h1>Erste Schritte</h1>
      </div>

      <p class="subtitle">
        Wichtige Informationen für internationale Studierende in Bochum
      </p>
    </div>

    <section class="cards">
      <InfoCard
        title="Mobilität"
        image="/deutschlandticket.jpg"
        text="Das Deutschlandticket gilt für Busse, Straßenbahnen, U-Bahnen und Regionalzüge in ganz Deutschland. Es gilt jedoch nicht für Fernverkehrszüge wie ICE, IC oder EC.
        Für längere Strecken zwischen Städten sind ICE-Züge oft schneller, aber meistens teurer. FlixBus kann eine günstigere Alternative sein. Ein Preisvergleich vor der Buchung lohnt sich besonders für Studierende."
        link1Name="Deutsche Bahn"
        link1Url="https://www.bahn.de"
        link2Name="FlixBus"
        link2Url="https://www.flixbus.de"
      />

      <InfoCard
        title="Anmeldung & Aufenthalt"
        image="/anmeldung.jpg"
        text="Die Anmeldung beim Bürgerbüro gehört zu den wichtigsten ersten Schritten nach der Ankunft in Deutschland. Die Meldebescheinigung wird für viele weitere Vorgänge benötigt, zum Beispiel für ein Bankkonto oder die Aufenthaltserlaubnis. Termine sollten möglichst früh gebucht werden, da die Wartezeiten teilweise mehrere Wochen betragen können. Auch die Verlängerung des Aufenthaltstitels sollte rechtzeitig vorbereitet werden."
        link1Name="Stadt Bochum"
        link1Url="https://www.bochum.de"
        link2Name="Ausländerbüro"
        link2Url="https://www.bochum.de/Auslaenderbuero"
      />

      <InfoCard
        title="Finanzierung"
        image="/Finanz.jpg"
        text="Für ein Studium in Deutschland muss die Finanzierung des Lebensunterhalts nachgewiesen werden. Der erforderliche Betrag liegt derzeit bei etwa 992 Euro pro Monat beziehungsweise 11.904 Euro pro Jahr. Dies kann beispielsweise über ein Sperrkonto, die Unterstützung durch Familienangehörige oder eine Verpflichtungserklärung erfolgen. Viele Studierende arbeiten zusätzlich als Werkstudenten oder wissenschaftliche Hilfskräfte, um ihr Einkommen zu verbessern."
        link1Name="DAAD"
        link1Url="https://www.daad.de"
        link2Name="RUB Jobs"
        link2Url="https://www.ruhr-uni-bochum.de/de/jobs-und-praktika"
      />

      <InfoCard
        title="Versicherungen"
        image="/versicherung.jpg"
        text="Eine gültige Krankenversicherung ist für Studierende in Deutschland verpflichtend. Ohne Krankenversicherung ist eine Einschreibung an einer Hochschule in der Regel nicht möglich. Zusätzlich kann eine private Haftpflichtversicherung sinnvoll sein, da sie Schäden gegenüber anderen Personen absichert. Je nach persönlicher Situation können auch Zahnzusatz- oder Hausratversicherungen hilfreich sein."
        link1Name="TK"
        link1Url="https://www.tk.de"
        link2Name="AOK"
        link2Url="https://www.aok.de"
      />
    </section>

    <Checklist />
  </main>
</template>

<style scoped>
.page {
  min-height: 100vh;
  background-color: #e5ec98;
  font-family: Arial, sans-serif;
  padding-bottom: 50px;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 25px 40px;
}

.title-box {
  background-color: #f5f3d0;
  padding: 15px 35px;
}

.title-box h1 {
  margin: 0;
  font-size: 36px;
}

.subtitle {
  margin: 0;
  font-size: 22px;
  font-weight: bold;
}

.cards {
  display: flex;
  justify-content: center;
  gap: 35px;
  flex-wrap: nowrap;
  margin-top: 40px;
}
</style>