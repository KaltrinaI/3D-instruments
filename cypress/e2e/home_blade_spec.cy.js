describe('Home Page', () => {
  beforeEach(() => {
    cy.visit('http://localhost:8000/home');
  });

  it('should load the home page', () => {
    cy.get('.title').within(() => {
      cy.get('h1').should('contain.text', 'Strings')
        .and('contain.text', 'N\'')
        .and('contain.text', 'Things');
    });
    cy.contains('h3', 'Home of the rarest instruments from across the globe');
  });

  it('should display the latest instrument additions section', () => {
    cy.contains('h4', 'Latest additions');
  });

  it('should display at least one instrument in the latest additions section', () => {
    cy.get('.card').should('have.length.greaterThan', 0);
  });

  it('should display the correct details for the first instrument in the latest additions', () => {
    cy.get('.card').first().within(() => {
        cy.get('.card-title').should('contain', 'Yamaha FG800');
        cy.get('.card-text').should('contain', '$56.08');
    });
  });

  it('should navigate to the instrument details page when "See more" is clicked', () => {
    cy.get('.card').first().within(() => {
        cy.get('a').contains('See more').click();
    });
    cy.url().should('include', '/catalogue/3/latest/');
    cy.contains('h3', 'Yamaha FG800');
  });

  it('should correctly navigate to the catalogue page from the navigation menu', () => {
    cy.get('nav').contains('Catalogue').click();
    cy.url().should('include', '/catalogue');
    cy.contains('Catalogue');
  });

  it('should correctly navigate to the shopping cart page from the navigation menu', () => {
    cy.get('nav').contains('Shopping cart').click();
    cy.url().should('include', '/shopping_cart');
    cy.contains('Shopping cart');
  });

  it('should load the images correctly for each instrument', () => {
    cy.get('.card img').each(($img) => {
      cy.wrap($img).should('have.attr', 'src').and('not.be.empty');
    });
  });

  it('should display the instrument names and prices correctly for all listed instruments', () => {
    cy.get('.card').each(($el) => {
        cy.wrap($el).within(() => {
            cy.get('.card-title').should('not.be.empty'); 
            cy.get('.card-text').should('contain.text', '$');
        });
    });
  });

  it('should highlight the Home menu item as active', () => {
    cy.get('nav').within(() => {
      cy.get('.nav-item.active').should('contain', 'Home');
    });
  });

  it('should handle missing image gracefully', () => {
    cy.get('.card').first().within(() => {
      cy.get('img').should('exist').and(($img) => {
        expect($img[0].naturalWidth).to.be.greaterThan(0);
      });
    });
  });

  it('should not display any JavaScript errors in the console', () => {
    cy.on('window:before:load', (win) => {
      cy.spy(win.console, 'error');
    });
    cy.visit('http://localhost:8000/home');
    cy.window().then((win) => {
      expect(win.console.error).to.have.callCount(0);
    });
  });
});
