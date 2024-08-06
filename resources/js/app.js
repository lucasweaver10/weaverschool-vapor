/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './bootstrap';
import RecordRTC from 'recordrtc';
import LazyLoad from "vanilla-lazyload";
import * as speechSdk from "microsoft-cognitiveservices-speech-sdk";


const lazyLoadInstance = new LazyLoad({
    threshold: 100,
});

// window.Echo.channel('test-events')
//     .listen('TestEventFired', (e) => {
//     console.log('Event heard');
// });

