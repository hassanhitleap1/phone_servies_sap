import Vue from 'vue';
import VueLoading from 'vuejs-loading-plugin';

// using default options
Vue.use(VueLoading);

// overwrite defaults
Vue.use(VueLoading, {
    dark: true, // default false
    text: 'Ladataan', // default 'Loading'
    loading: true, // default false
    customLoader: 'sss', // replaces the spinner and text with your own
    background: 'rgb(255,255,255)', // set custom background
    classes: ['myclass'] // array, object or string
  });
