import { Selectize } from './Selectize.js';
import { UI } from './UI.js';
import { Record } from './Record.js';

export class Dns {
    constructor() {
        this.selectize = new Selectize();
        this.ui = new UI(this.selectize);
        this.record = new Record(this.ui);

        this.ui.attachEventHandlers(this.record);
    }
}