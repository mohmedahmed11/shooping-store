/*

Give the service worker access to Firebase Messaging.

Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.

*/

importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');

importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');



/*

Initialize the Firebase app in the service worker by passing in the messagingSenderId.

* New configuration for app@pulseservice.com

*/

firebase.initializeApp({

    apiKey: "BFvxhwlVHoYQHSK_Vnk_WhaJFu7nnqbLS95m_8yteiEttNfQqTlsqXzyXwxoQw_kd2RpqFkTm7YgnEXRcW6w5xs",

    authDomain: "https://fcm.googleapis.com/fcm/send",

    databaseURL: "https://hasnaa-store.firebaseio.com",

    projectId: "hasnaa-store",

    storageBucket: "hasnaa-store.appspot.com",

    messagingSenderId: "983489749154",

    appId: "1:983489749154:ios:1334f04386dadeaf2ff7fb",

    });



/*

Retrieve an instance of Firebase Messaging so that it can handle background messages.

*/

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {

    console.log(

        "[firebase-messaging-sw.js] Received background message ",

        payload,

    );

    /* Customize notification here */

    const notificationTitle = "Background Message Title";

    const notificationOptions = {

        body: "Background Message body.",

        icon: "/itwonders-web-logo.png",

    };



    return self.registration.showNotification(

        notificationTitle,

        notificationOptions,

    );

});
