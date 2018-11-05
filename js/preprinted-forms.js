/**
 * Created by holmes on 12/16/16.
 */


// When the Material (attribute_pa_material) is changed
   // Grab $available_variations array
   // Cycle through $available_variations to pull out all objects that have the selected attribute_pa_material Set
   // Cycle through attribute_pa_material objects and check for all unique Pre-printed (attribute_pa_preprinted) fields.
   // Build Pre-printed select box from array of unique attribute_pa_preprinted fields.
   // output select box.



// If attribute_pa_preprinted is selected as 'Yes' then show form in class .single_variation_wrap
// console.log("Hey pal, I am ready to go, are you?");

// document.getElementById( "pa_preprinted" ).onchange( function() {
//   console.log( "Handler .onchange() called on pa_preprinted." );
// });

// jQuery( "#pa_preprinted" ).change(function() {
//   console.log( "Handler for .change() called." );
// });

// Hide the form.
// jQuery("#gform_fields_2").hide();
//document.getElementById("gform_fields_2").style.display = "none";

// Watch for a change to the preprinted select box.
// jQuery("#pa_preprinted").select(function() {
//
//
//   console.log( "it changed buddy" );
//
//   console.log(this.value);
//
//   // Get the selected item
//   var print = jQuery("#pa_preprinted").value;
//
//   // If the selected item is equal to Yes
//   if( print == "yes" ) {
//     // Turn on the form.
//     jQuery("#gform_fields_2").show();
//
//   //Otherwise
//   } else {
//     // Hide it.
//     jQuery("#gform_fields_2").hide();
//   }
// });

// document.getElementById("gform_fields_2").innerHTML = "hello";