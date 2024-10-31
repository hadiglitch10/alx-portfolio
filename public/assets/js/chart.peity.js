$(function() {
  'use strict';

  // Line chart initialization
  $('.peity-line').peity('line');

  // Bar charts initialization
  $('.peity-bar').peity('bar');

  // Pie chart initialization
  $('.peity-pie').peity('pie');

  // Donut chart initialization
  $('.peity-donut').peity('donut');

  // Using data attributes for donut chart
  $(".data-attributes span").peity("donut");

  // Event handling for updating chart on select change
  $("select").change(function() {
      var text = $(this).val() + "/" + 5; // Format the text for display

      // Update the corresponding span with the new value and trigger change
      $(this)
          .siblings("span.graph")
          .text(text)
          .change();

      // Update the notice element to inform the user
      $("#notice").text("Chart updated: " + text);
  }).change(); // Trigger change event on page load

  // Initialize pie chart for the span element
  $("span.graph").peity("pie");

  // Updating charts with random values over time
  var updatingChart = $(".updating-chart").peity("line", { width: "100%", height: 150 });

  // Set an interval to update the chart every 2.5 seconds
  setInterval(function() {
      var random = Math.round(Math.random() * 20); // Generate a random value
      var values = updatingChart.text().split(","); // Get current values
      values.shift(); // Remove the first value
      values.push(random); // Add the new random value

      // Update the chart with the new values and trigger change
      updatingChart
          .text(values.join(","))
          .change();
  }, 2500);

  // Note: Bar chart initialization found in bracket.js
});
