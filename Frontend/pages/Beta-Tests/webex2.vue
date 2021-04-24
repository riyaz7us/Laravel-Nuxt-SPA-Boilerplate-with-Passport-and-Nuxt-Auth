<template>
  <div>
    <div id="my-webexteams-widget" style="width: 500px; height: 500px" />
  </div>
</template>

<script>
export default {
  mounted() {
		this.mountWidget()
  },
  methods: {
		async mountWidget(){
    let script = document.createElement("script");
    script.setAttribute(
      "src",
      "https://code.s4d.io/widget-space/production/bundle.js"
    );
    document.head.appendChild(script);
    let link = document.createElement("link");
    link.setAttribute(
      "href",
      "https://code.s4d.io/widget-space/production/main.css"
    );
    link.setAttribute("rel", "stylesheet");
    document.head.appendChild(link);
    var widgetEl = document.getElementById("my-webexteams-widget");
    // Init a new widget
    await window.webex.widget(widgetEl).spaceWidget({
      accessToken:
        "ZDA3ODg0YTEtYWE0Yi00NjkzLTgyNDctZDE3ODY2MzRhYWVhMzNlZTUxZjktOTQy_P0A1_e0796e43-9341-40de-87ea-bfc92d9028a9",
      destinationId: "51c06482-9879-11eb-8a38-c16e87542bb1",
      destinationType: "51c06482-9879-11eb-8a38-c16e87542bb1",
    });
		}
	},
};
</script>

<style>
</style>