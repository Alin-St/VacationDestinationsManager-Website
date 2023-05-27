import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { AddDestinationComponent } from './components/add-destination/add-destination.component';
import { UpdateDestinationComponent } from './components/update-destination/update-destination.component';
import { ShowDestinationsComponent } from './components/show-destinations/show-destinations.component';

@NgModule({
  declarations: [
    AppComponent,
    AddDestinationComponent,
    UpdateDestinationComponent,
    ShowDestinationsComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
