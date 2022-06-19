// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyAlxURQYtlCSPVn92_N-ED_czTPBMQl0XE",
    authDomain: "smicarts.firebaseapp.com",
    projectId: "smicarts",
    storageBucket: "smicarts.appspot.com",
    messagingSenderId: "753170170612",
    appId: "1:753170170612:web:713bbad39d7f86176514a1",
    measurementId: "G-EREGPTSDBT"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);
    const title = payload.notification.title;
    const options = {
        body: payload.notification.body,
        icon: payload.notification.image,
    };
    return self.registration.showNotification(
        title,
        options,
    );
});
