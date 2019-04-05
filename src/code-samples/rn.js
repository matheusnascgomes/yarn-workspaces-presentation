import OneSignal from 'react-native-onesignal'; 
// Import package from node modules

export default class App extends Component {

  constructor(properties) {
    super(properties);
    
    OneSignal.init("YOUR_ONESIGNAL_APPID");

    OneSignal.addEventListener('received', this.onReceived);
    OneSignal.addEventListener('opened', this.onOpened);
    OneSignal.addEventListener('ids', this.onIds);
  }

}